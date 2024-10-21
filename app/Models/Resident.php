<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'name',
        'image_path',
        'gender',
        'birthdate',
        'address',
        'religion',
        'profession',
    ];

    public function history()
    {
        return $this->belongsTo(History::class);
    }


}
