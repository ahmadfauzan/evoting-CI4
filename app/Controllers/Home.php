<?php

namespace App\Controllers;

use App\Models\PaslonModel;
use App\Models\KandidatModel;
use App\Models\HasilModel;
use Myth\Auth\Models\UserModel;

class Home extends BaseController
{
	protected $paslonModel;
	public function __construct()
	{
		$this->paslonModel = new PaslonModel();
		$this->kandidatModel = new KandidatModel();
		$this->hasilModel = new HasilModel();
		$this->userModel = new UserModel();
	}

	public function index()
	{
		$data = [
			'paslon' => $this->paslonModel->findAll(),
			'ketua' => $this->kandidatModel->getKandidat(1, 0),
			'wakil' => $this->kandidatModel->getKandidat(2, 0)
		];
		// dd($data['ketua']);
		// dd($data['paslon']);
		return view('vote/index', $data);
	}

	public function visi_misi($id_paslon)
	{
		// $data['paslon'] = $this->paslonModel->getWhere(['no_urut' => $no_urut])->getResultArray();
		// $data['kandidat'] = $this->kandidatModel->getWhere(['no_urut' => $no_urut])->getResultArray();
		$data['visi_misi'] = $this->paslonModel->getVisiMisi($id_paslon);
		$data['prestasi'] = $this->kandidatModel->getPrestasi($id_paslon);
		$data['kandidat'] =  $this->kandidatModel->getWhere(['no_urut' => $id_paslon])->getResultArray();
		// dd($data['kandidat']);

		return view('vote/visi_misi', $data);
	}

	public function hitungHasil($id)
	{
		$hasil = [
			'no_urut' => $id,
			'user_id' => (user_id())
		];

		$jml = $this->hasilModel->getJml((user_id()));
		if ($jml < 1) {
			// $validation = \Config\Services::validation();
			$this->hasilModel->save($hasil);
			return redirect()->to('/home/hasil');
		} else {
			return redirect()->to('/home')->withInput();
		}
	}

	public function hasil()
	{
		$data['ketua'] = $this->kandidatModel->getKandidat(1, 0);
		$data['hasil'] = $this->hasilModel->getHasil();
		$data['unggul'] = $this->hasilModel->getPaslonUnggul();
		$no_urut = $data['unggul']['no_urut'];
		$data['ketuaUnggul'] = $this->kandidatModel->getKandidat(1, $no_urut);
		$data['wakilUnggul'] = $this->kandidatModel->getKandidat(2, $no_urut);
		$data['totalUser'] = $this->userModel->getJmlUser();
		$data['totalHasil'] = $this->hasilModel->getJml(0);
		// dd($data['hasil']);
		// dd($data['ketuaUnggul']);
		return view('vote/hasil', $data);
	}



	//--------------------------------------------------------------------

}
