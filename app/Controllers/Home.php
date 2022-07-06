<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\produkModel;
use App\Models\AkunModel;
use Illuminate\Support\Facades\Http;

class Home extends BaseController
{
	public function __construct()
    {
		// session_start();
        //load kelas AkunModel
        $this->akunmodel = new AkunModel();
		//load kelas KategoriModel
        $this->KategoriModel = new KategoriModel();
		//load kelas produkModel
		$this->produkModel = new produkModel();
		$pager = \Config\Services::pager();
    }

	public function index()
	{
		$data['activeMenu'] = "dashboard";
		return view('home', $data);
		// echo view('home');
	}



	private function Gtrends()
	{
		$kategori = $this->KategoriModel->getAll();
		$keyword = [];

		foreach($kategori as $key){
			$keyword[] = str_replace(' ', '%20', $key['nama_kategori']);
		}

		$startTime = date('Y-m-d', strtotime('-1 day'));
		$endTime = date('Y-m-d', strtotime('-1 month'));		
	
		$i = 0;
		foreach($keyword as $key){
			$url = 'http://localhost:3000/gtrend?keyword='.$key.'&startTime='.$startTime.'&endTime='.$endTime;			
			$data = file_get_contents($url);
			$data = json_decode($data, true);
			$trends[] = ([
				'keyword' => str_replace('%20', ' ', $key),
				'data' => $data['value'],
				'kode_kategori' => $kategori[$i]['kode_kategori'],
				'nama_kategori' => $kategori[$i]['nama_kategori'],
				'gambar' => $kategori[$i]['gambar']
			]);
			$i++;
		}

		usort($trends, function($a, $b) {
			return $b['data'] <=> $a['data'];
		});

		// dd($trends);
		return $trends;
	}

	public function web()
	{
		$data['trend'] = $this->Gtrends();
		// session_start();
		// $data['produk'] = $this->produkModel->getAll2();
		$data['kategori'] = $this->KategoriModel->getAll();
		$data['produk'] = $this->produkModel->paginate(8, 'group1');
		$data['pager'] = $this->produkModel->pager;
		$data['cart'] = \Config\Services::cart();
		// $data['pelanggan'] = $this->LoginModel->getAll();
		return view('website', $data);
	}

	public function about()
	{
		$data['kategori'] = $this->KategoriModel->getAll();
		$data['cart'] = \Config\Services::cart();
		// $data['pelanggan'] = $this->LoginModel->getAll();
		return view('purishop/about', $data);
	}

	public function ceklogin()
	{
		
		$hasil = $this->akunmodel->cekUsernamePwd();

		//iterasi hasil query
		foreach ($hasil as $row)
		{
			$jml = $row->jml;
		}
		
		//nilai jml adalah 1 menunjukkan bahwa pasangan username dan password cocok
		if($jml>0){	
			echo view('home');
			// echo view('HeaderBootstrap');
			// echo view('SidebarBootstrap');
			// echo view('BodyBootstrap');
		}else{
			//jika tidak sama maka dikembalikan ke ceklogin
			$data['pesan'] = 'Pasangan username dan password tidak tepat';
			
return view('login', $data);
		}
		
	}
}
