<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
  /**
   * Display a listing of the users.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = User::all();
    return view('pages.admin.user.index', compact('users'));
  }

  /**
   * Show the form for creating a new user.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.admin.user.create');
  }

  /**
   * Store a newly created user in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'nama_222320'     => 'required|string|max:255',
      'email_222320'    => 'required|string|email|max:255|unique:users_222320,email_222320',
      'phone_222320'    => 'nullable|string|max:15',
      'alamat_222320'   => 'nullable|string',
      'gender_222320'   => 'nullable|in:L,P',
      'password_222320' => 'required|string|min:8|confirmed',
      'role_222320'     => 'required|in:admin,user',
    ]);

    $user = User::create([
      'email_222320'    => Str::uuid(),
      'nama_222320'     => $request->nama_222320,
      'email_222320'    => $request->email_222320,
      'phone_222320'    => $request->phone_222320,
      'alamat_222320'   => $request->alamat_222320,
      'gender_222320'   => $request->gender_222320,
      'password_222320' => Hash::make($request->password_222320),
      'role_222320'     => $request->role_222320,
    ]);

    return redirect()
      ->route('admin.users.index')
      ->with('success', 'User created successfully.');
  }

  /**
   * Display the specified user.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    return view('pages.admin.user.show', compact('user'));
  }

  /**
   * Show the form for editing the specified user.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('pages.admin.user.edit', compact('user'));
  }

  /**
   * Update the specified user in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $rules = [
      'nama_222320'   => 'required|string|max:255',
      'phone_222320'  => 'nullable|string|max:15',
      'alamat_222320' => 'nullable|string',
      'gender_222320' => 'nullable|in:L,P',
      'role_222320'   => 'required|in:admin,user',
    ];

    // Only validate email if it's changed
    if ($request->email_222320 != $user->email_222320) {
      $rules['email_222320'] = 'required|string|email|max:255|unique:users_222320,email_222320';
    }

    // Only validate password if it's provided
    if ($request->filled('password_222320')) {
      $rules['password_222320'] = 'string|min:8|confirmed';
    }

    $request->validate($rules);

    $userData = [
      'nama_222320'   => $request->nama_222320,
      'email_222320'  => $request->email_222320,
      'phone_222320'  => $request->phone_222320,
      'alamat_222320' => $request->alamat_222320,
      'gender_222320' => $request->gender_222320,
      'role_222320'   => $request->role_222320,
    ];

    if ($request->filled('password_222320')) {
      $userData['password_222320'] = Hash::make($request->password_222320);
    }

    $user->update($userData);

    return redirect()
      ->route('admin.users.index')
      ->with('success', 'User updated successfully');
  }

  /**
   * Remove the specified user from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();

    return redirect()
      ->route('admin.users.index')
      ->with('success', 'User deleted successfully');
  }

  /**
   * Display the user profile.
   *
   * @return \Illuminate\Http\Response
   */
  public function profile()
  {
    $user = auth()->user();
    return view('pages.admin.user.profile', compact('user'));
  }

  /**
   * Update the user profile.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function updateProfile(Request $request)
  {
    $user = auth()->user();

    $rules = [
      'nama_222320'   => 'required|string|max:255',
      'phone_222320'  => 'required|string|max:15',
      'alamat_222320' => 'required|string',
      'gender_222320' => 'required|in:male,female',
    ];

    // Only validate email if it's changed
    if ($request->email_222320 != $user->email_222320) {
      $rules['email_222320'] = 'required|string|email|max:255|unique:users_222320,email_222320';
    }

    $request->validate($rules);

    $userData = [
      'nama_222320'   => $request->nama_222320,
      'email_222320'  => $request->email_222320,
      'phone_222320'  => $request->phone_222320,
      'alamat_222320' => $request->alamat_222320,
      'gender_222320' => $request->gender_222320,
    ];

    $user->update($userData);

    return redirect()
      ->route('profile')
      ->with('success', 'Profile updated successfully');
  }

  /**
   * Show the form for changing password.
   *
   * @return \Illuminate\Http\Response
   */
  public function changePassword()
  {
    return view('pages.admin.user.change-password');
  }

  /**
   * Update the user's password.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function updatePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required|string',
      'password_222320'  => 'required|string|min:8|confirmed',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->current_password, $user->password_222320)) {
      return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    $user->update([
      'password_222320' => Hash::make($request->password_222320),
    ]);

    return redirect()
      ->route('profile')
      ->with('success', 'Password changed successfully');
  }
}
