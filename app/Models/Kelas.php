<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    public function wali_kelas()
{
    return $this->belongsTo(User::class);
}
public function user()
{
    return $this->hasMany(User::class);
}
}