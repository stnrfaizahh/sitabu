<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bendahara extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
    ];
    protected $table = 'bendahara';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function laporanBendahara()
    {
        return $this->hasMany(LaporanBendahara::class, 'bendahara_id');
    }
}