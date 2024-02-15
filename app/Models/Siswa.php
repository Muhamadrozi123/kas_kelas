<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    Protected $table = 'siswa';
    Protected $fillable =['nama','kelas',];

    public function pembayaran() {
        return $this->hasMany(Pembayaran::class, 'id_siswa');
    }
}

