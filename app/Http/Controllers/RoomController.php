<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\TipeRoom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the pages.admin.room.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('tipeRoom')->get();
        return view('pages.admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new pages.admin.room.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipeRooms = TipeRoom::all();
        return view('pages.admin.room.create', compact('tipeRooms'));
    }

    /**
     * Store a newly created room in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_room_222320'    => 'required|string|max:255',
            'nama_kamar_222320' => 'required|string|max:255',
            'gambar_222320'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_222320'     => 'required|string|in:available,booked,maintenance',
            'tipe_id_222320'    => 'required|exists:tiperoom_222320,tipe_id_222320',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle file upload
        if ($request->hasFile('gambar_222320')) {
            $imagePath = $request->file('gambar_222320')->store('room_images', 'public');
        }

        Room::create([
            'id_room_222320'    => $request->id_room_222320,
            'nama_kamar_222320' => $request->nama_kamar_222320,
            'gambar_222320'     => $imagePath ?? null,
            'status_222320'     => $request->status_222320,
            'tipe_id_222320'    => $request->tipe_id_222320,
        ]);

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room created successfully');
    }

    /**
     * Display the specified pages.admin.room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::with(['tipeRoom', 'bookings'])->findOrFail($id);
        return view('pages.admin.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified pages.admin.room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room      = Room::findOrFail($id);
        $tipeRooms = TipeRoom::all();
        return view('pages.admin.room.edit', compact('room', 'tipeRooms'));
    }

    /**
     * Update the specified room in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kamar_222320' => 'required|string|max:255',
            'gambar_222320'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_222320'     => 'required|string|in:available,booked,maintenance',
            'tipe_id_222320'    => 'required|exists:tiperoom_222320,tipe_id_222320',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $room = Room::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('gambar_222320')) {
            // Delete old image if exists
            if ($room->gambar_222320) {
                Storage::disk('public')->delete($room->gambar_222320);
            }

            $imagePath           = $request->file('gambar_222320')->store('room_images', 'public');
            $room->gambar_222320 = $imagePath;
        }

        $room->nama_kamar_222320 = $request->nama_kamar_222320;
        $room->status_222320     = $request->status_222320;
        $room->tipe_id_222320    = $request->tipe_id_222320;
        $room->save();

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified room from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        // Delete associated image if exists
        if ($room->gambar_222320) {
            Storage::disk('public')->delete($room->gambar_222320);
        }

        // Check if the room has associated bookings
        if ($room->bookings()->count() > 0) {
            return redirect()
                ->route('admin.rooms.index')
                ->with('error', 'Cannot delete room with associated bookings.');
        }

        $room->delete();

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room deleted successfully');
    }

    /**
     * Display a listing of available pages.admin.room.
     *
     * @return \Illuminate\Http\Response
     */
    public function available()
    {
        $rooms = Room::with('tipeRoom')
            ->where('status_222320', 'available')
            ->get();

        return view('pages.admin.room.available', compact('rooms'));
    }

    /**
     * Change room status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_222320' => 'required|string|in:available,booked,maintenance',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid status value'
            ], 400);
        }

        $room                = Room::findOrFail($id);
        $room->status_222320 = $request->status_222320;
        $room->save();

        return response()->json([
            'success' => true,
            'message' => 'Room status updated successfully',
            'status'  => $request->status_222320
        ]);
    }

    /**
     * Update room stock.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Get rooms by type.
     *
     * @param  int  $typeId
     * @return \Illuminate\Http\Response
     */
    public function getByType($typeId)
    {
        $rooms = Room::with('tipeRoom')
            ->where('tipe_id_222320', $typeId)
            ->get();

        $tipeRoom = TipeRoom::findOrFail($typeId);

        return view('pages.admin.room.by_type', compact('rooms', 'tipeRoom'));
    }
}
