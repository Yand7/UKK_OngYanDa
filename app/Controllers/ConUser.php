<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\U_model;

class ConUser extends BaseController
{
 
    public function user(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new U_model();
            $data['us'] = $model->getUser();
    
            echo view('header');
            echo view('menu');
            echo view('user', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}
   
    public function bin_user(){
        if(session()->get('level')==1) {
            $model = new U_model();
            $data['us'] = $model->getBinUser();
    
            echo view('header');
            echo view('menu');
            echo view('bin_user', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function t_user(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new U_model(); 
            
            $data['lvl'] = $model->getLevel();
    
            echo view('header');
            echo view('menu');
            echo view('t_user', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
        
    }

    public function output_tuser(){
		$a = $this -> request-> getPost('nl');
		$b = $this -> request-> getPost('nm');
		$c = $this -> request-> getPost('em');
		$d = $this -> request-> getPost('pw');
		$e = $this -> request-> getPost('lv');
		
		$model=new H_model();

		$data = array(
			'n_lengkap' => $a,
			'username' => $b,
			'email' => $c,
			'pw' =>md5($d),
			'level' => $e,
			'create_date' => date('Y-m-d H:i:s')
		);

		// print_r($data);
		$model->simpan('user',$data);		

		return redirect()->to ('/ConUser/user');
    }

    public function e_user($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $model2 = new U_model(); 
    
            $where = array('id_user'=>$id);
            $data['us'] = $model->getWhere('user', $where);
            
            $data['lvl'] = $model2->getLevel();
    
            echo view('header');
            echo view('menu');
            echo view('e_user', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	
    }

    public function output_euser(){
		$id = $this -> request-> getPost('ide');
		$a = $this -> request-> getPost('nl');
		$b = $this -> request-> getPost('nm');
		$c = $this -> request-> getPost('em');
		$d = $this -> request-> getPost('pw');
		$e = $this -> request-> getPost('lv');

		$model = new H_Model();
		$where=array('id_user'=>$id);
		$data = array(
			'n_lengkap' => $a,
			'username' => $b,
			'email' => $c,
			'pw' =>md5($d),
			'level' => $e,
			'update_date' => date('Y-m-d H:i:s')
		);
		
		// print_r($data2);
		$model->qedit('user', $data,$where);

		return redirect()->to ('/ConUser/user');
	}

    public function delete_user($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_user'=>$id);
            $model->hapus('user', $where);
            return redirect()->to ('/ConUser/bin_user');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }
    
    public function soft_delete_user($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $where = array('id_user'=>$id);
            
            $data2 = array(
                'delete_date' => date('Y-m-d H:i:s')
            );
    
            $model->qedit('user', $data2, $where);
    
            return redirect()->to ('/ConUser/user');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function restore_user($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_user'=>$id);
            
            $data2 = array(
                'delete_date' => null
            );
    
            $model->qedit('user', $data2, $where);
    
            return redirect()->to ('/ConUser/bin_user');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function user_s(){
    if(session()->get('level')>0) {
        $model = new U_model(); 

        $data['us'] = $model->getUserSetting();

        echo view('header');
        echo view('menu');
        echo view('v_us', $data);
        echo view('footer');
    }else{
        return redirect()->to('/Home/log_out');
    }
    }

    public function cpass(){
    if(session()->get('level')>0) {
        $model = new H_model();
        // $on = 'user.level=level.id_level';
        $id = session()->get('id');
        $where=array('id_user'=>$id);
        $data['pp'] = $model->getWhere('user', $where);

        echo view ('header');
        echo view ('menu');
        echo view ('cpass', $data);
        echo view ('footer');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function checkPassword() {
        $p=$this->request->getPost('pw');
        $model= new H_model();
        $data=array(
            'pw'=>md5($p)
        );
        $cek=$model->getWhere('user', $data);
        if ($cek->id_user==session()->get('id')) {
            return redirect()->to('/ConUser/cpass');
        }else {
            return redirect()->to('/ConUser/user_s');
        }
    }

    public function output_cpass(){
        $id = $this -> request-> getPost('ide');
        $a = $this -> request-> getPost('p2');
        
        $model=new H_model();
        $where=array('id_user'=>$id);
        $data = array(
            'pw' => md5($a)
        );

        // print_r($data);
        $model->qedit('user',$data,$where);		

        return redirect()->to ('/ConUser/user_s');
    }

    public function output_selfuser(){
		$id = $this -> request-> getPost('ide');
		$a = $this -> request-> getPost('nl');
		$b = $this -> request-> getPost('nm');
		$c = $this -> request-> getPost('em');
		
		$model=new H_model();
		$where=array('id_user'=>$id);
		$data = array(
			'n_lengkap' => $a,
			'username' => $b,
			'email' => $c
		);
        
		$model->qedit('user',$data,$where);		

		return redirect()->to ('/ConUser/user_s');
	}

    public function level(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new U_model();
            $data['l'] = $model->getLevel();
    
            echo view('header');
            echo view('menu');
            echo view('level', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}
   
    public function bin_level(){
        if(session()->get('level')==1) {
            $model = new U_model();
            $data['us'] = $model->getBinUser();
    
            echo view('header');
            echo view('menu');
            echo view('bin_level', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function t_level(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new U_model(); 
            
            $data['lvl'] = $model->getLevel();
    
            echo view('header');
            echo view('menu');
            echo view('t_level', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
        
    }

    public function output_tlevel(){
		$b = $this -> request-> getPost('nl');
		
		$model=new H_model();

		$data = array(
			'nm_level' => $b
        );

		// print_r($data);
		$model->simpan('level',$data);		

		return redirect()->to ('/ConUser/level');
    }

    public function e_level($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
    
            $where = array('id_level'=>$id);
            $data['l'] = $model->getWhere('level', $where);
        
            echo view('header');
            echo view('menu');
            echo view('e_level', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	
    }

    public function output_elevel(){
		$id = $this -> request-> getPost('ide');
        $b = $this -> request-> getPost('nl');

		$model = new H_Model();
		$where=array('id_level'=>$id);
		$data = array(
			'nm_level' => $b
        );
		
		// print_r($data2);
		$model->qedit('level', $data,$where);

		return redirect()->to ('/ConUser/level');
	}

    public function delete_level($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_level'=>$id);
            $model->hapus('level', $where);
            return redirect()->to ('/ConUser/level');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

}