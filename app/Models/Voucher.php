<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Voucher extends Model
{
    use HasFactory;

    protected $table      = 'vouchers_222320';
    protected $primaryKey = 'id_voucher_222320';
    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'id_voucher_222320',
        'kode_voucher_222320',
        'id_user_222320',
        'tipe_222320',
        'persentase_diskon_222320',
        'tanggal_kadaluarsa_222320',
        'status_222320',
        'id_booking_terpakai_222320',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id_voucher_222320) {
                $latest                   = static::latest('id_voucher_222320')->first();
                $lastNumber               = $latest ? (int) substr($latest->id_voucher_222320, 2) : 0;
                $model->id_voucher_222320 = 'VC' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            }
            if (!$model->kode_voucher_222320) {
                $model->kode_voucher_222320 = 'DISKON-' . strtoupper(Str::random(8));
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_222320', 'email_222320');
    }
}
