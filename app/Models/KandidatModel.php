<?php

namespace App\Models;

use App\Controllers\Kandidat;
use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table      = 'kandidat';
    protected $allowedFields = ['nama', 'semester', 'prodi', 'img'];

    public function getKandidat($pos)
    {
        return $this
            ->select('nama', 'posisi')
            ->join('posisi', 'posisi.id_kandidat = kandidat.id_kandidat')
            ->where('posisi.posisi', $pos)
            ->get()->getResultArray();
    }


    public function getPrestasi($no_urut)
    {

        return $this
            ->select('*')
            ->join('prestasi AS S', 'kandidat.id_kandidat = S.id_kandidat')
            ->where('kandidat.no_urut', $no_urut)
            ->get()->getResultArray();
    }
}
