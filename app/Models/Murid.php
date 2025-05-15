<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';

    protected $fillable = [
    'nama', 'nis', 'kelas', 'no_telp', 'jenis_kelamin', 'tanggal_lahir', 'id_user'
];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_murid');
    }
}
