<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeRoom extends Model
{
    /** @use HasFactory<\Database\Factories\TipeRoomFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tiperoom_222320';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'tipe_id_222320';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_tipe_222320',
        'deskripsi_222320',
        'harga_222320',
        'fasilitas_222320',
    ];

    /**
     * Get the rooms for the room type.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class, 'tipe_id_222320', 'tipe_id_222320');
    }
}
