<?php

namespace App\Models;

use CodeIgniter\Model;

class PaslonModel extends Model
{
    protected $table      = 'paslon';
    protected $allowedFields = ['id_paslon', 'no_urut', 'img'];

    // public function getPaslon()
    // {
    //     // $db = \Config\Database::connect();
    //     // // $builder = $db->table('paslon');
    //     // // // $builder->select('id_paslon', 'paslon.img', 'kandidat.nama', 'paslon.no_urut');
    //     // // $builder->select('id_paslon', 'paslon.no_urut', 'kandidat.nama', 'paslon.img');
    //     // // $builder->join('kandidat', 'kandidat.no_urut = paslon.no_urut');
    //     // // $result = $builder->get();

    //     // $sql = "SELECT id_paslon, paslon.no_urut, kandidat.nama, paslon.img, kandidat.posisi FROM paslon INNER JOIN kandidat ON paslon.no_urut = kandidat.no_urut";
    //     // $result = $db->query($sql);

    //     return $result->getResultArray();
    // }


    public function getVisiMisi($id_paslon)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('paslon');



        return $builder
            ->select('*')
            ->join('visi_misi AS S', 'paslon.id_paslon = S.id_paslon')
            ->where('paslon.id_paslon', $id_paslon)
            ->get()->getResultArray();
    }
}
