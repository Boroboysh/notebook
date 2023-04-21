<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'full_name',
        'company',
        'phone_number',
        'email',
        'date_birth',
        'photo'
    ];
}
