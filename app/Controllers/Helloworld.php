<?php
namespace App\Controllers;

use App\Models\KosanModel;

class Helloworld extends BaseController
{
    //public function __construct()
      //  {
            //load kelas AkunModel
            //$this->kategorimodel = new KategoriModel();
        //}

	public function index()
	{
        
       		echo "Hello World!";
		
	}

    public function comment()
    {
        echo "Contoh method";
    }

    public function sapaan($nama, $kelas){
        echo "Nama saya adalah : ".$nama;
        echo "<br>";
        echo "Kelas saya adalah : ".$kelas;
        echo "<br>";
    }

    public function aksesdb(){
        $data['umkm_puri_utami'] = $this->kategorimodel->getAll();
        echo view('LihatKategori', $data);
        //print_r($data['umkm_puri_utami']);
    }

    public function tes(){
                   
//$output = shell_exec('python D:\\tes_save_model_iris.py');
$output = shell_exec('python D:\\tes_helloworld.py');
echo "<pre>$output</pre>";}


}