<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pembayaran extends Model
{
    protected $table      = 'pembayaran_222320';
    protected $primaryKey = 'id_pembayaran_222320';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'id_pembayaran_222320',
        'id_booking_222320',
        'jumlah_bayar_222320',
        'metode_pembayaran_222320',
        'status_pembayaran_222320',
        'tanggal_pembayaran_222320',
        'bukti_pembayaran_222320',
        'keterangan_222320',
    ];

    // Relasi ke Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking_222320');
    }

    // Generate ID otomatis seperti PB0001, PB0002, dst.
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id_pembayaran_222320) {
                $latest = static::latest('id_pembayaran_222320')->first();
                if ($latest) {
                    $lastNumber = (int) substr($latest->id_pembayaran_222320, 2);  // Ambil angka dari PBxxxx
                    $newNumber  = $lastNumber + 1;
                } else {
                    $newNumber = 1;
                }
                $model->id_pembayaran_222320 = 'PB' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
