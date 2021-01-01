<?php

namespace App\Models;

use App\Controllers\Kandidat;
use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table      = 'kandidat';
    protected $allowedFields = ['nama', 'semester', 'prodi', 'img', 'prestasi', 'no_urut'];

    public function getKandidat($pos, $no_urut)
    {
        if ($no_urut == 0) {
            return $this
                ->select('*')
                ->where('posisi', $pos)
                ->get()->getResultArray();
        } else {
            return $this
                ->select('nama')
                ->where('posisi', $pos)
                ->where('kandidat.no_urut', $no_urut)
                ->get()->getRowArray();
        }
    }


    public function getPrestasi()
    {

        return $this
            ->select('prestasi')
            ->get()->getResultArray();
    }
}
