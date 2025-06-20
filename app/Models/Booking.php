<?php

namespace App\Models;

use App\Helpers\IdGenerator;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking_222320';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_booking_222320';

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
        'id_booking_222320',
        'email_222320',
        'id_room_222320',
        'tanggal_checkin_222320',
        'tanggal_checkout_222320',
        'jumlah_tamu_222320',
        'total_harga_222320',
        'status_222320',
        'catatan_222320',
        'catatan_admin_222320',
        'tanggal_booking_222320',
        'tanggal_pembatalan_222320',
        'waktu_checkin_222320',
        'waktu_checkout_222320',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_checkin_222320'    => 'date',
        'tanggal_checkout_222320'   => 'date',
        'tanggal_booking_222320'    => 'datetime',
        'tanggal_pembatalan_222320' => 'datetime',
        'waktu_checkin_222320'      => 'datetime',
        'waktu_checkout_222320'     => 'datetime',
        'total_harga_222320'        => 'decimal:2',
        'jumlah_tamu_222320'        => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = IdGenerator::bookingId();
            }
        });
    }

    /**
     * Get the user that owns the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'email_222320');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_booking_222320', 'id_booking_222320');
    }

    /**
     * Get the room associated with the booking.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'id_room_222320', 'id_room_222320');
    }

    /**
     * Scope for filtering by status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status_222320', $status);
    }

    /**
     * Scope for filtering by date range.
     */
    public function scopeByDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('tanggal_booking_222320', [$startDate, $endDate]);
    }

    /**
     * Scope for current user's bookings.
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('email_222320', $userId);
    }

    /**
     * Get status badge color for display.
     */
    public function getStatusBadgeAttribute()
    {
        $colors = [
            'menunggu_konfirmasi' => 'warning',
            'dikonfirmasi'        => 'info',
            'checkin'             => 'success',
            'checkout'            => 'secondary',
            'dibatalkan'          => 'danger',
        ];

        return $colors[$this->status_222320] ?? 'light';
    }

    /**
     * Get status label in Indonesian.
     */
    public function getStatusLabelAttribute()
    {
        $labels = [
            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
            'dikonfirmasi'        => 'Dikonfirmasi',
            'checkin'             => 'Check-in',
            'checkout'            => 'Check-out',
            'dibatalkan'          => 'Dibatalkan',
        ];

        return $labels[$this->status_222320] ?? 'Unknown';
    }

    /**
     * Get total duration in days.
     */
    public function getTotalDaysAttribute()
    {
        return Carbon::parse($this->tanggal_checkin_222320)
            ->diffInDays(Carbon::parse($this->tanggal_checkout_222320));
    }

    /**
     * Check if booking can be cancelled.
     */
    public function getCanBeCancelledAttribute()
    {
        if (in_array($this->status_222320, ['checkin', 'checkout', 'dibatalkan'])) {
            return false;
        }

        // Check if it's at least 24 hours before checkin
        $checkinDate = Carbon::parse($this->tanggal_checkin_222320);
        return $checkinDate->diffInHours(now()) >= 24;
    }

    /**
     * Check if booking can be checked in.
     */
    public function getCanCheckinAttribute()
    {
        if ($this->status_222320 !== 'dikonfirmasi') {
            return false;
        }

        $today       = Carbon::today();
        $checkinDate = Carbon::parse($this->tanggal_checkin_222320);

        return $today->gte($checkinDate);
    }

    /**
     * Check if booking can be checked out.
     */
    public function getCanCheckoutAttribute()
    {
        return $this->status_222320 === 'checkin';
    }

    /**
     * Get formatted price.
     */
    public function getFormattedTotalHargaAttribute()
    {
        return 'Rp ' . number_format($this->total_harga_222320, 0, ',', '.');
    }

    /**
     * Get booking code for display.
     */
    public function getBookingCodeAttribute()
    {
        return 'BK-' . substr($this->id_booking_222320, -8);
    }

    /**
     * Check if booking is active (not cancelled or completed).
     */
    public function getIsActiveAttribute()
    {
        return !in_array($this->status_222320, ['dibatalkan', 'checkout']);
    }

    /**
     * Get days until checkin.
     */
    public function getDaysUntilCheckinAttribute()
    {
        if ($this->status_222320 === 'checkin' || $this->status_222320 === 'checkout') {
            return 0;
        }

        $checkinDate = Carbon::parse($this->tanggal_checkin_222320);
        $today       = Carbon::today();

        if ($checkinDate->lt($today)) {
            return 0;  // Past checkin date
        }

        return $today->diffInDays($checkinDate);
    }

    /**
     * Get all possible booking statuses.
     */
    public static function getStatuses()
    {
        return [
            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
            'dikonfirmasi'        => 'Dikonfirmasi',
            'checkin'             => 'Check-in',
            'checkout'            => 'Check-out',
            'dibatalkan'          => 'Dibatalkan',
        ];
    }
}
