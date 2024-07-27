<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property string $nik
 * @property string $nkk
 * @property string $nama
 * @property string $alamat
 * @property int $tps
 * @method static \Database\Factories\PemilihFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih whereNik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih whereNkk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pemilih whereTps($value)
 */
	class Pemilih extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property mixed $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

