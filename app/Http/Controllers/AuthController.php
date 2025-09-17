<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  /**
   * Show the login form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showLoginForm()
  {
    return view('pages.auth.login');
  }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    // Validasi input
    $credentials = $request->validate(
      [
        'email'    => ['required', 'email'],
        'password' => 'required|min:8|max:10',
        'role'     => 'required|in:admin,user',
      ],
      [
        'email.required'    => 'Email wajib diisi.',
        'email.email'       => 'Masukkan email yang valid.',
        'password.required' => 'Password wajib diisi.',
        'password.min'      => 'Password harus memiliki minimal 8 karakter.',
        'password.max'      => 'Password tidak boleh lebih dari 10 karakter.',
        'role.required'     => 'Role wajib dipilih.',
        'role.in'           => 'Role yang dipilih tidak valid.',
      ]
    );

    Log::info('Attempting login for:', [
      'email' => $credentials['email'],
      'role'  => $credentials['role']
    ]);

    if (Auth::attempt([
      'email_222320' => $credentials['email'],
      'password'     => $credentials['password'],
      'role_222320'  => $credentials['role']
    ])) {
      $request->session()->regenerate();

      session([
        'user_id'   => Auth::user()->email_222320,
        'user_role' => Auth::user()->role_222320,
        'email'     => Auth::user()->email_222320,
        'name'      => Auth::user()->nama_222320,
      ]);

      $user = Auth::user();

      $voucherPenggunaBaru = Voucher::where('id_user_222320', $user->email_222320)
        ->where('tipe_222320', 'pengguna_baru')
        ->where('status_222320', 'tersedia')
        ->first();

      Log::debug('Hasil pencarian voucher untuk pengguna baru:', [
        'user_email'        => $user->email_222320,
        'voucher_ditemukan' => $voucherPenggunaBaru ? $voucherPenggunaBaru->toArray() : null
      ]);

      if ($voucherPenggunaBaru) {
        $request->session()->put('show_new_user_voucher', [
          'kode'   => $voucherPenggunaBaru->kode_voucher_222320,
          'diskon' => $voucherPenggunaBaru->persentase_diskon_222320
        ]);
      }

      Log::info('Login successful for user:', [
        'user_id' => Auth::user()->email_222320,
        'email'   => Auth::user()->email_222320,
        'role'    => Auth::user()->role_222320
      ]);

      if (Auth::user()->role_222320 === 'admin') {
        return redirect()->intended(route('admin.rooms.index'))->with('success', 'Login berhasil sebagai Admin!');
      } else {
        return redirect()->intended('/')->with('success', 'Login berhasil sebagai User!');
      }
    }

    // Gagal login - tanpa menggunakan flash error (withErrors)
    return redirect()->back()->with([
      'login_error' => 'Email, password, atau role yang Anda masukkan salah.',
      'old_email'   => $credentials['email'],
      'old_role'    => $credentials['role']
    ]);
  }

  /**
   * Show the registration form.
   *
   * @return \Illuminate\Http\Response
   */
  public function showRegistrationForm()
  {
    return view('pages.auth.signup');
  }

  protected function authenticated(Request $request, $user)
  {
    // Cek apakah user punya voucher 'pengguna_baru' yang masih tersedia
    $voucherPenggunaBaru = \App\Models\Voucher::where('id_user_222320', $user->email_222320)
      ->where('tipe_222320', 'pengguna_baru')
      ->where('status_222320', 'tersedia')
      ->first();

    // Jika voucher ada, kirim flash session untuk memicu modal
    if ($voucherPenggunaBaru) {
      $request->session()->flash('show_new_user_voucher', [
        'kode'   => $voucherPenggunaBaru->kode_voucher_222320,
        'diskon' => $voucherPenggunaBaru->persentase_diskon_222320
      ]);
    }
  }

  /**
   * Handle a registration request for the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function register(Request $request)
  {
    $request->validate([
      'nama_222320'     => 'required|string|max:255',
      'email_222320'    => 'required|string|email|max:255|unique:users_222320,email_222320',
      'phone_222320'    => 'nullable|string|max:255',
      'alamat_222320'   => 'nullable|string|max:500',
      'gender_222320'   => 'nullable|string|in:male,female,other',
      'password_222320' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
      'nama_222320'     => $request->nama_222320,
      'email_222320'    => $request->email_222320,
      'phone_222320'    => $request->phone_222320,
      'alamat_222320'   => $request->alamat_222320,
      'gender_222320'   => $request->gender_222320,
      'password_222320' => Hash::make($request->password_222320),
      'role_222320'     => 'user',
    ]);

    if ($user) {
      Voucher::create([
        'id_user_222320'            => $user->email_222320,
        'tipe_222320'               => 'pengguna_baru',
        'persentase_diskon_222320'  => 15,  // Ganti sesuai keinginan
        'tanggal_kadaluarsa_222320' => Carbon::now()->addDays(14),  // Berlaku 14 hari
      ]);
    }
    // Auth::login($user);

    return redirect()->route('login');
  }

  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
  }

  /**
   * Show the form for requesting a password reset link.
   *
   * @return \Illuminate\Http\Response
   */
  public function showForgotPasswordForm()
  {
    return view('auth.forgot-password');
  }

  /**
   * Send a reset link to the given user.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function sendPasswordResetLink(Request $request)
  {
    $request->validate([
      'email_222320' => 'required|email',
    ]);

    // For this example, we'll just redirect back with a success message.
    // In a real application, you would use Laravel's built-in password reset functionality.
    return back()->with('status', 'If your email exists in our system, you will receive a password reset link.');
  }

  /**
   * Show the password reset form.
   *
   * @param  string  $token
   * @return \Illuminate\Http\Response
   */
  public function showResetPasswordForm($token)
  {
    return view('auth.reset-password', ['token' => $token]);
  }

  /**
   * Reset the user's password.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function resetPassword(Request $request)
  {
    $request->validate([
      'token'           => 'required',
      'email_222320'    => 'required|email',
      'password_222320' => 'required|min:8|confirmed',
    ]);

    // For this example, we'll just redirect back with a success message.
    // In a real application, you would use Laravel's built-in password reset functionality.
    return redirect()
      ->route('login')
      ->with('status', 'Your password has been reset!');
  }
}
