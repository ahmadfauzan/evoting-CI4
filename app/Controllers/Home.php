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
		$jml = $this->hasilModel->getJml((user_id()));

		if ($jml > 0) {

			$userVote = $this->hasilModel->getUserVote((user_id()));

			$now    = time();
			$target = strtotime($userVote['waktu_pilih']);
			$diff   = $now - $target;

			if ($userVote['isExpired'] == 0) {
				if ($diff >= 300) {
					$hasil = [
						'id_hasil' => $userVote['id_hasil'],
						'isExpired' => 1
					];
					$this->hasilModel->save($hasil);
					$data = [
						'paslon' => $this->paslonModel->findAll(),
						'ketua' => $this->kandidatModel->getKandidat(1, 0),
						'wakil' => $this->kandidatModel->getKandidat(2, 0),
						'pilih' => $jml,
						'pilihanUser' => $this->hasilModel->getUserVote((user_id()))
					];

					return view('vote/index', $data);
				}
			}
			$data = [
				'paslon' => $this->paslonModel->findAll(),
				'ketua' => $this->kandidatModel->getKandidat(1, 0),
				'wakil' => $this->kandidatModel->getKandidat(2, 0),
				'pilih' => $jml,
				'pilihanUser' => $this->hasilModel->getUserVote((user_id())),
			];
			return view('vote/index', $data);
		} else {
			$data = [
				'paslon' => $this->paslonModel->findAll(),
				'ketua' => $this->kandidatModel->getKandidat(1, 0),
				'wakil' => $this->kandidatModel->getKandidat(2, 0),
				'pilih' => $jml,
				'pilihanUser' => $this->hasilModel->getUserVote((user_id()))
			];

			return view('vote/index', $data);
		}
	}

	public function visi_misi($no_urut)
	{

		$data['visi_misi'] = $this->paslonModel->getVisiMisi($no_urut);
		$data['kandidat'] =  $this->kandidatModel->getWhere(['no_urut' => $no_urut])->getResultArray();
		$data['ketua'] = $this->kandidatModel->getKandidat(1, 0);
		$data['wakil'] = $this->kandidatModel->getKandidat(2, 0);
		if (empty($data['visi_misi'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}

		return view('vote/visi_misi', $data);
	}

	public function hitungHasil($id)
	{
		$hasil = [
			'no_urut' => $id,
			'user_id' => (user_id()),
			'waktu_pilih' => date("Y-m-d H:i:s")
		];

		$jml = $this->hasilModel->getJml((user_id()));
		if ($jml < 1) {
			$this->hasilModel->save($hasil);
			return redirect()->to('/home/hasil');
		} else {
			session()->setFlashdata(['pesan' => 'Anda sudah memilih!', 'tipe' => 'danger']);
			return redirect()->to('/home');
		}
	}

	public function ubahHasil($id)
	{


		$userVote = $this->hasilModel->getUserVote((user_id()));

		$now    = time();
		$target = strtotime($userVote['waktu_pilih']);
		$diff   = $now - $target;

		if ($diff <= 300) {
			$hasil = [
				'id_hasil' => $userVote['id_hasil'],
				'no_urut' => $id,
				'user_id' => (user_id()),
				'isUpdate' => 1
			];
			$this->hasilModel->save($hasil);
			return redirect()->to('/hasil');
		} else {
			session()->setFlashdata(['pesan' => 'Waktu mengganti pilihan sudah habis', 'tipe' => 'danger']);
			return redirect()->to('/home');
		}
	}

	public function hasil()
	{
		$data['ketua'] = $this->kandidatModel->getKandidat(1, 0);
		$data['wakil'] = $this->kandidatModel->getKandidat(2, 0);
		$data['hasil'] = $this->hasilModel->getHasil();
		$data['unggul'] = $this->hasilModel->getPaslonUnggul();
		if ($data['unggul'] != null) {

			$no_urut = $data['unggul']['no_urut'];
		} else {
			$no_urut = 1;
		}
		$data['ketuaUnggul'] = $this->kandidatModel->getKandidat(1, $no_urut);
		$data['wakilUnggul'] = $this->kandidatModel->getKandidat(2, $no_urut);
		$data['totalUser'] = $this->userModel->getJmlUser();
		$data['totalHasil'] = $this->hasilModel->getJml(0);

		return view('vote/hasil', $data);
	}

	public function notFound()
	{
		return view('errors/html/error_404');
	}



	//--------------------------------------------------------------------

}
