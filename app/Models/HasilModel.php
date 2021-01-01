<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table      = 'hasil';
    protected $primaryKey = 'id_hasil';
    protected $allowedFields = ['no_urut', 'user_id', 'waktu_pilih', 'isUpdate', 'isExpired'];

    public function getJml($user_id)
    {
        if ($user_id < 1) {
            return $this
                ->select('*')
                ->countAllResults();
        } else {
            return $this
                ->select('*')
                ->where('user_id', $user_id)
                ->countAllResults();
        }
    }

    public function getHasil()
    {
        return $this
            ->select('no_urut, COUNT(*) as total')
            ->groupBy('no_urut')
            ->OrderBy('no_urut', 'ASC')
            ->get()->getResultArray();
    }

    public function getPaslonUnggul()
    {
        return $this
            ->select('hasil.no_urut, img, COUNT(hasil.no_urut) as total')
            ->join('paslon', 'paslon.no_urut = hasil.no_urut')
            ->GroupBy('hasil.no_urut')
            ->OrderBy('total', 'DESC')
            ->limit(1)
            ->get()->getRowArray();
    }

    public function getUserVote($user_id)
    {
        return $this
            ->select('*')
            ->where('user_id', $user_id)
            ->get()->getRowArray();
    }
}
