<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas'
    ];

    public static function rules()
    {
        return [
            'kelas' => 'required|string|max:255'
        ];
    }
}
