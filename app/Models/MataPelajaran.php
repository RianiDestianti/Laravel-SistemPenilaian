<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';

    protected $fillable = ['kode', 'mata_pelajaran'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'mata_pelajaran');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_mata_pelajaran');
    }
}
