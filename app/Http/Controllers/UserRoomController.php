<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\TipeRoom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserRoomController extends Controller
{
    /**
     * Display a listing of all rooms for users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('tipeRoom')->get();
        return view('pages.users.room', compact('rooms'));
    }

    /**
     * Display details of a specific room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::with('tipeRoom')->findOrFail($id);
        return view('pages.users.detail', compact('room'));
    }

    /**
     * Display available rooms for booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function available()
    {
        $rooms = Room::with('tipeRoom')
            ->where('status_222320', 'available')
            ->get();
        return view('pages.users.rooms.available', compact('rooms'));
    }

    /**
     * Display rooms by room type.
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

        return view('pages.users.rooms.by_type', compact('rooms', 'tipeRoom'));
    }

    /**
     * Search rooms based on criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = Room::with('tipeRoom');

        // Filter by room type if provided
        if ($request->has('tipe_id_222320') && $request->tipe_id_222320) {
            $query->where('tipe_id_222320', $request->tipe_id_222320);
        }

        // Only show available rooms
        $query->where('status_222320', 'available');

        $rooms     = $query->get();
        $roomTypes = TipeRoom::all();

        return view('pages.users.rooms.search', compact('rooms', 'roomTypes'));
    }

    /**
     * Display featured rooms on homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function featured()
    {
        // Get available rooms from different types
        $featuredRooms = Room::with('tipeRoom')
            ->where('status_222320', 'available')
            ->orderBy('tipe_id_222320')
            ->take(6)
            ->get();

        return view('pages.users.rooms.featured', compact('featuredRooms'));
    }
}
