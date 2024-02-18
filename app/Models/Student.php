<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'tanggal_lahir',
        'kelas_id',
        'alamat'
    ];

    public static function rules()
    {
        return [
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kelas' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ];
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
