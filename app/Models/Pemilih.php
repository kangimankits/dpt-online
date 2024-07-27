<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    public $timestamps = false;

    private $placeholder = '**********';

    protected function nik(): Attribute
    {
        return Attribute::get(fn($val) => substr($val, 0, 6).$this->placeholder);
    }

    protected function nkk(): Attribute
    {
        return Attribute::get(fn($val) => substr($val, 0, 6).$this->placeholder);
    }
}
