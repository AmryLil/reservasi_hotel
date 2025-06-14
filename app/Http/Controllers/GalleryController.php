<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends RoutingController
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $galleries = Gallery::latest()->get();
    // Mengarahkan ke view admin untuk menampilkan semua data galeri
    return view('pages.admin.gallery.index', compact('galleries'));
  }

  public function indexUser()
  {
    $galleries = Gallery::latest()->get();
    // Anda bisa membuat view baru untuk pengguna, contohnya di 'pages.gallery.index'
    return view('pages.users.gallery', compact('galleries'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    // Mengarahkan ke view form untuk menambah data galeri
    return view('pages.admin.gallery.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validasi input dari form
    $request->validate([
      'judul_222320'       => 'required|string|max:255',
      'deskripsi_222320'   => 'required|string',
      'path_gambar_222320' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Mengelola file gambar yang diupload
    $imagePath = $request->file('path_gambar_222320')->store('gallery', 'public');

    // Membuat data baru di database
    Gallery::create([
      'id_gallery_222320'  => (string) Str::uuid(),  // Generate UUID karena incrementing=false
      'judul_222320'       => $request->judul_222320,
      'deskripsi_222320'   => $request->deskripsi_222320,
      'path_gambar_222320' => $imagePath,
    ]);

    // Redirect ke halaman index galeri admin dengan pesan sukses
    return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil ditambahkan.');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Gallery $gallery)
  {
    // Mengarahkan ke view form untuk mengedit data galeri
    return view('pages.admin.gallery.edit', compact('gallery'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Gallery $gallery)
  {
    // Validasi input dari form
    $request->validate([
      'judul_222320'       => 'required|string|max:255',
      'deskripsi_222320'   => 'required|string',
      'path_gambar_222320' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imagePath = $gallery->path_gambar_222320;

    // Cek jika ada file gambar baru yang diupload
    if ($request->hasFile('path_gambar_222320')) {
      // Hapus gambar lama jika ada
      if ($gallery->path_gambar_222320) {
        Storage::delete($gallery->path_gambar_222320);
      }
      // Simpan gambar baru
      $imagePath = $request->file('path_gambar_222320')->store('gallery', 'public');
    }

    // Update data di database
    $gallery->update([
      'judul_222320'       => $request->judul_222320,
      'deskripsi_222320'   => $request->deskripsi_222320,
      'path_gambar_222320' => $imagePath,
    ]);

    // Redirect ke halaman index galeri admin dengan pesan sukses
    return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Gallery $gallery)
  {
    // Hapus file gambar dari storage
    if ($gallery->path_gambar_222320) {
      Storage::delete($gallery->path_gambar_222320);
    }

    // Hapus data dari database
    $gallery->delete();

    // Redirect ke halaman index galeri admin dengan pesan sukses
    return redirect()->route('admin.gallery.index')->with('success', 'Galeri berhasil dihapus.');
  }
}
