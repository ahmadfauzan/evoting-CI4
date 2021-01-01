<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\KandidatModel;

class PaslonModel extends Model
{
    protected $table      = 'paslon';
    protected $allowedFields = ['id_paslon', 'no_urut', 'img', 'visi', 'misi'];



    public function getVisiMisi($no_urut)
    {

        return $this
            ->select('*')
            ->where('no_urut', $no_urut)
            ->get()->getRowArray();
    }
}
