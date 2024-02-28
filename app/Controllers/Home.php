<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\U_model;

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
        echo view('header');
        echo view('menu');
        echo view('footer');
    }
	
}