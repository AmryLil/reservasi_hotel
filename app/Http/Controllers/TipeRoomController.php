<?php

namespace App\Http\Controllers;

use App\Models\TipeRoom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class TipeRoomController extends Controller
{
  /**
   * Display a listing of the room types.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tipeRooms = TipeRoom::all();
    return view('pages.admin.tipe.index', compact('tipeRooms'));
  }

  /**
   * Show the form for creating a new room type.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.admin.tipe.create');
  }

  /**
   * Store a newly created room type in database.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'tipe_id_222320'   => 'required|string|max:255',
      'nama_tipe_222320' => 'required|string|max:255',
      'deskripsi_222320' => 'required|string',
      'harga_222320'     => 'required|numeric|min:0',
      'fasilitas_222320' => 'required|array',
    ]);

    // Generate a unique ID for the room type

    // Process facilities array into comma-separated string
    $fasilitas = implode(',', $request->fasilitas_222320);

    TipeRoom::create([
      'tipe_id_222320'   => $request->tipe_id_222320,
      'nama_tipe_222320' => $request->nama_tipe_222320,
      'deskripsi_222320' => $request->deskripsi_222320,
      'harga_222320'     => $request->harga_222320,
      'fasilitas_222320' => $fasilitas,
    ]);

    return redirect()
      ->route('admin.tiperoom.index')
      ->with('success', 'Tipe room berhasil ditambahkan');
  }

  /**
   * Display the specified room type.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $tipeRoom = TipeRoom::findOrFail($id);

    // Convert comma-separated facilities to array for display
    $fasilitas = explode(',', $tipeRoom->fasilitas_222320);

    return view('pages.admin.tipe.show', compact('tipeRoom', 'fasilitas'));
  }

  /**
   * Show the form for editing the specified room type.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $tipeRoom = TipeRoom::findOrFail($id);

    // Convert comma-separated facilities to array for form
    $fasilitas = explode(',', $tipeRoom->fasilitas_222320);

    return view('pages.admin.tipe.edit', compact('tipeRoom', 'fasilitas'));
  }

  /**
   * Update the specified room type in database.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nama_tipe_222320' => 'required|string|max:255',
      'deskripsi_222320' => 'required|string',
      'harga_222320'     => 'required|numeric|min:0',
      'fasilitas_222320' => 'required|array',
    ]);

    $tipeRoom = TipeRoom::findOrFail($id);

    // Process facilities array into comma-separated string
    $fasilitas = implode(',', $request->fasilitas_222320);

    $tipeRoom->update([
      'nama_tipe_222320' => $request->nama_tipe_222320,
      'deskripsi_222320' => $request->deskripsi_222320,
      'harga_222320'     => $request->harga_222320,
      'fasilitas_222320' => $fasilitas,
    ]);

    return redirect()
      ->route('admin.tiperoom.index')
      ->with('success', 'Tipe room berhasil diperbarui');
  }

  /**
   * Remove the specified room type from database.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $tipeRoom = TipeRoom::findOrFail($id);

    // Check if there are any related rooms before deleting
    if ($tipeRoom->rooms()->count() > 0) {
      return redirect()
        ->back()
        ->with('error', 'Tidak dapat menghapus tipe room karena masih memiliki kamar terkait');
    }

    $tipeRoom->delete();

    return redirect()
      ->route('admin.tiperoom.index')
      ->with('success', 'Tipe room berhasil dihapus');
  }
}
