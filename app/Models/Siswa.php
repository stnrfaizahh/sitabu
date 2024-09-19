<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey ='siswa_id';
    
    protected $fillable = [
        'user_id',
    ];
 
    protected $table = 'siswa';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wali_kelas()
    {
        return $this->belongsTo(Walikelas::class, 'wali_kelas_id');
    }
}