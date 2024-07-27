<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    public $timestamps = false;
}
