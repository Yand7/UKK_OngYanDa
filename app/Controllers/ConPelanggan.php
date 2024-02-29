<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\P_model;

class ConPelanggan extends BaseController
{
 
    public function pelanggan(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new P_model();
            $data['p'] = $model->getPelanggan();
                
            echo view('header');
            echo view('menu');
            echo view('pelanggan', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}
   
    public function bin_pelanggan(){
        if(session()->get('level')==1) {
            $model = new P_model();
            $data['p'] = $model->getBinPelanggan();
    
            echo view('header');
            echo view('menu');
            echo view('bin_pelanggan', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function t_pelanggan(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            
            echo view('header');
            echo view('menu');
            echo view('t_pelanggan');
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
        
    }

    public function output_tpelanggan(){
		$b = $this -> request-> getPost('np');
		$c = $this -> request-> getPost('a');
		$d = $this -> request-> getPost('n');

        $model = new H_model();

		$data = array(
			'nm_pelanggan' => $b,
			'alamat' => $c,
			'nhp' => $d,
			'create_date' => date('Y-m-d H:i:s')
		);

		// print_r($data);
		$model->simpan('pelanggan',$data);		

		return redirect()->to ('/ConPelanggan/pelanggan');
    }

    public function e_pelanggan($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
    
            $where = array('id_pelanggan'=>$id);
            $data['p'] = $model->getWhere('pelanggan', $where);
    
            echo view('header');
            echo view('menu');
            echo view('e_pelanggan', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	
    }

    public function output_epelanggan(){
		$id = $this -> request-> getPost('ide');
		$b = $this -> request-> getPost('np');
		$c = $this -> request-> getPost('a');
		$d = $this -> request-> getPost('n');
		

		$model = new H_Model();
		$where=array('id_pelanggan'=>$id);
		$data = array(
			'nm_pelanggan' => $b,
			'alamat' => $c,
			'nhp' => $d,
			'update_date' => date('Y-m-d H:i:s')
		);
		
		// print_r($data2);
		$model->qedit('pelanggan', $data,$where);

		return redirect()->to ('/ConPelanggan/pelanggan');
	}

    public function delete_pelanggan($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_pelanggan'=>$id);
            $model->hapus('pelanggan', $where);
            return redirect()->to ('/ConPelanggan/bin_pelanggan');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }
    
    public function soft_delete_pelanggan($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $where = array('id_pelanggan'=>$id);
            
            $data2 = array(
                'delete_date' => date('Y-m-d H:i:s')
            );
    
            $model->qedit('pelanggan', $data2, $where);
    
            return redirect()->to ('/ConPelanggan/pelanggan');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function restore_pelanggan($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_pelanggan'=>$id);
            
            $data2 = array(
                'delete_date' => null
            );
    
            $model->qedit('pelanggan', $data2, $where);
    
            return redirect()->to ('/ConPelanggan/bin_pelanggan');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

}