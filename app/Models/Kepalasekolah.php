<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepalasekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
    ];
    protected $table = 'kepala_sekolah';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}