<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
     protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];
    protected $table = 'users';
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id');
    }

    public function waliKelas()
    {
        return $this->hasOne(WaliKelas::class, 'user_id');
    }

    public function bendahara()
    {
        return $this->hasOne(Bendahara::class, 'user_id');
    }

    public function kepalaSekolah()
    {
        return $this->hasOne(KepalaSekolah::class, 'user_id');
    }

    // /**
    //  * Get the attributes that should be cast.
    //  *
    //  * @return array<string, string>
    //  */
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }

    
}