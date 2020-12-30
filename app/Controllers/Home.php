<?php

namespace App\Controllers;

use App\Models\PaslonModel;
use App\Models\KandidatModel;

class Home extends BaseController
{
	protected $paslonModel;
	public function __construct()
	{
		$this->paslonModel = new PaslonModel();
		$this->kandidatModel = new KandidatModel();
	}

	public function index()
	{
		$data = [
			'paslon' => $this->paslonModel->findAll(),
			'ketua' => $this->kandidatModel->getKandidat(1),
			'wakil' => $this->kandidatModel->getKandidat(2)
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



	//--------------------------------------------------------------------

}
