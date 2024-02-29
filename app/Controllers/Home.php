<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\U_model;
use App\Models\B_model;
use App\Models\C_model;
use App\Models\P_model;

class Home extends BaseController
{
    // public function index()
    // {
    //     return view('welcome_message');
    // }

    public function index(){
		echo view('header');
		echo view('login');
		// echo view('footer');
	}

	public function aksi_login(){
	$u=$this->request->getPost('username');
    $p=$this->request->getPost('pswd');
	
    $model= new H_model();
    $data=array(
        'username'=>$u,
        'pw'=>md5($p)
    );
    $cek=$model->getWhere2('user', $data);
    if ($cek>0) {
        session()->set('id', $cek['id_user']);
        session()->set('username', $cek['username']);
        session()->set('email', $cek['email']);
        session()->set('level', $cek['level']);
        return redirect()->to('/Home/mpg');

    }else {
        return redirect()->to('/Home');
    }
	}

	public function log_out(){
		// $model= new H_model();
		session()->destroy();

    	return redirect()->to('/Home');
	}
    
    public function mpg(){
    if(session()->get('level')==1 || session()->get('level')==2) {
        $model = new B_model();
        $data['b'] = $model->getBarang();
		
		$model2 = new C_model();
        $data['c'] = $model2->getCart();

        $model = new P_model();
        $data['p'] = $model->getPelanggan();

        echo view('header');
        echo view('menu');
        echo view('isi', $data);
        echo view('footer2', $data);
    }else{
        return redirect()->to('/Home/log_out');
    }
    }
	
}