<?php

namespace App\Models;

use App\Helpers\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room_222320';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_room_222320';

    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_room_222320',
        'nama_kamar_222320',
        'gambar_222320',
        'status_222320',
        'tipe_id_222320',
    ];

    /**
     * Get the room type associated with the room.
     */
    public function tipeRoom()
    {
        return $this->belongsTo(TipeRoom::class, 'tipe_id_222320', 'tipe_id_222320');
    }

    /**
     * Get the bookings for the room.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_room_222320', 'id_room_222320');
    }
}
