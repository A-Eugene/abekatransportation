<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jangkauan extends Model
{
    /** @use HasFactory<\Database\Factories\JangkauanFactory> */
    use HasFactory;

    protected $table = "jangkauan";

    protected $fillable = [
        'lokasi',
        'alamat',
        'telepon',
        'image',
    ];
    
    public $timestamps = false;
}
