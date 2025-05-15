<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nama', 'nip', 'email', 'no_telp', 'jenis_kelamin',
        'tanggal_lahir', 'id_user', 'mata_pelajaran'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru');
    }
}
