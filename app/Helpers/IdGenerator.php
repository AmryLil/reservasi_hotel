<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IdGenerator
{
  /**
   * Store for used IDs within current execution
   *
   * @var array
   */
  private static $usedIds = [];

  /**
   * Generate a custom ID with prefix and padding
   *
   * @param string $prefix The prefix for the ID (e.g., 'USR', 'ROOM')
   * @param string $table The table name to check last ID (e.g., 'users_222320')
   * @param string $field The primary key field name (e.g., 'email_222320')
   * @param int $padding The length of the numeric part (defaults to 5)
   * @return string The generated ID
   */
  public static function generateId($prefix, $table, $field, $padding = 5)
  {
    // Create a unique key for this ID type
    $cacheKey = "id_generator_{$prefix}_{$table}";

    // Use DB transaction to prevent race conditions
    return DB::transaction(function () use ($prefix, $table, $field, $padding, $cacheKey) {
      // Get the last ID from the database
      $lastId = DB::table($table)
        ->orderBy($field, 'desc')
        ->value($field);

      // Extract number from last ID or start from 0
      $lastNumber = 0;
      if ($lastId) {
        // Remove the prefix and get the numeric part
        $numericPart = preg_replace('/[^0-9]/', '', $lastId);
        if ($numericPart) {
          $lastNumber = (int) $numericPart;
        }
      }

      // If we've already generated some IDs in this execution, use the highest one
      $key = "{$prefix}_{$table}";
      if (isset(self::$usedIds[$key]) && self::$usedIds[$key] > $lastNumber) {
        $lastNumber = self::$usedIds[$key];
      }

      // Increment the number
      $nextNumber = $lastNumber + 1;

      // Store this as the latest ID for this type
      self::$usedIds[$key] = $nextNumber;

      // Format the number with leading zeros
      $formattedNumber = str_pad($nextNumber, $padding, '0', STR_PAD_LEFT);

      // Combine prefix and formatted number
      return $prefix . '-' . $formattedNumber;
    }, 3);  // Retry 3 times in case of deadlock
  }

  /**
   * Generate a User ID
   *
   * @return string
   */
  public static function userId()
  {
    return self::generateId('USR', 'users_222320', 'email_222320');
  }

  /**
   * Generate a Room ID
   *
   * @return string
   */
  public static function roomId()
  {
    return self::generateId('ROOM', 'room_222320', 'id_room_222320');
  }

  /**
   * Generate a Booking ID
   *
   * @return string
   */
  public static function bookingId()
  {
    return self::generateId('BKG', 'booking_222320', 'id_booking_222320');
  }

  /**
   * Generate a Room Type ID
   *
   * @return string
   */
  public static function roomTypeId()
  {
    return self::generateId('TYPE', 'tiperoom_222320', 'tipe_id_222320');
  }

  /**
   * Generate a Gallery ID
   *
   * @return string
   */
  public static function galleryId()
  {
    return self::generateId('GAL', 'gallery_222320', 'id_gallery_222320');
  }

  /**
   * Generate a Review ID
   *
   * @return string
   */
  public static function reviewId()
  {
    return self::generateId('RVW', 'review_222320', 'id_review_222320');
  }

  /**
   * Generate multiple IDs at once (for batch operations)
   *
   * @param string $prefix The prefix for the ID
   * @param string $table The table name to check last ID
   * @param string $field The primary key field name
   * @param int $count Number of IDs to generate
   * @param int $padding The length of the numeric part
   * @return array Array of generated IDs
   */
  public static function generateBatchIds($prefix, $table, $field, $count = 1, $padding = 5)
  {
    $ids = [];

    // Use DB transaction to prevent race conditions
    DB::transaction(function () use ($prefix, $table, $field, $count, $padding, &$ids) {
      // Get the last ID from the database
      $lastId = DB::table($table)
        ->orderBy($field, 'desc')
        ->value($field);

      // Extract number from last ID or start from 0
      $lastNumber = 0;
      if ($lastId) {
        // Remove the prefix and get the numeric part
        $numericPart = preg_replace('/[^0-9]/', '', $lastId);
        if ($numericPart) {
          $lastNumber = (int) $numericPart;
        }
      }

      // If we've already generated some IDs in this execution, use the highest one
      $key = "{$prefix}_{$table}";
      if (isset(self::$usedIds[$key]) && self::$usedIds[$key] > $lastNumber) {
        $lastNumber = self::$usedIds[$key];
      }

      // Generate the requested number of IDs
      for ($i = 1; $i <= $count; $i++) {
        $nextNumber      = $lastNumber + $i;
        $formattedNumber = str_pad($nextNumber, $padding, '0', STR_PAD_LEFT);
        $ids[]           = $prefix . '-' . $formattedNumber;
      }

      // Store the latest used ID
      self::$usedIds[$key] = $lastNumber + $count;
    }, 3);  // Retry 3 times in case of deadlock

    return $ids;
  }

  /**
   * Generate a batch of Room Type IDs
   *
   * @param int $count Number of IDs to generate
   * @return array Array of generated IDs
   */
  public static function batchRoomTypeIds($count)
  {
    return self::generateBatchIds('TYPE', 'tiperoom_222320', 'tipe_id_222320', $count);
  }

  /**
   * Generate a custom date-based ID with prefix
   *
   * @param string $prefix The prefix for the ID
   * @param string $table The table name to check last ID
   * @param string $field The primary key field name
   * @return string The generated ID with date format
   */
  public static function dateBasedId($prefix, $table, $field)
  {
    // Get current date in format YYYYMMDD
    $date = date('Ymd');

    // Use DB transaction to prevent race conditions
    return DB::transaction(function () use ($prefix, $table, $field, $date) {
      // Get the last ID from the database with the same date
      $lastId = DB::table($table)
        ->where($field, 'like', $prefix . '-' . $date . '%')
        ->orderBy($field, 'desc')
        ->value($field);

      // Extract sequence number from last ID or start from 1
      $sequence = 1;
      if ($lastId) {
        // Get the sequence number after the date
        $parts = explode('-', $lastId);
        if (count($parts) > 2) {
          $sequence = (int) $parts[2] + 1;
        }
      }

      // Key for tracking used IDs in this session
      $key = "{$prefix}_{$date}";
      if (isset(self::$usedIds[$key]) && self::$usedIds[$key] >= $sequence) {
        $sequence = self::$usedIds[$key] + 1;
      }

      // Store this sequence
      self::$usedIds[$key] = $sequence;

      // Format the sequence with leading zeros (3 digits)
      $formattedSequence = str_pad($sequence, 3, '0', STR_PAD_LEFT);

      // Combine prefix, date and sequence
      return $prefix . '-' . $date . '-' . $formattedSequence;
    }, 3);  // Retry 3 times in case of deadlock
  }
}
