<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\U_model;
use App\Models\B_model;

class ConBarang extends BaseController
{
 
    public function barang(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new B_model();
            $data['b'] = $model->getBarang();
    
            echo view('header');
            echo view('menu');
            echo view('barang', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function t_barang(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            
            echo view('header');
            echo view('menu');
            echo view('t_barang');
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
        
    }

    public function output_tbarang(){
		$b = $this -> request-> getPost('nb');
		$c = $this -> request-> getPost('h');
		$d = $this -> request-> getPost('s');
		
        $model=new H_model();
        $str = $model->getKdBarang();

		$data = array(
			'kd_barang' => $str,
			'nm_barang' => $b,
			'harga' =>$c,
			'stok' => $d,
			'create_date' => date('Y-m-d H:i:s')
		);

		// print_r($data);
		$model->simpan('barang',$data);		

		return redirect()->to ('/ConBarang/barang');
    }

    public function e_barang($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
    
            $where = array('id_barang'=>$id);
            $data['b'] = $model->getWhere('barang', $where);
    
            echo view('header');
            echo view('menu');
            echo view('e_barang', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	
    }

    public function output_ebarang(){
		$id = $this -> request-> getPost('ide');
		$b = $this -> request-> getPost('nb');
		$c = $this -> request-> getPost('h');
		$d = $this -> request-> getPost('s');

		$model = new H_Model();
		$where=array('id_barang'=>$id);
		$data = array(
			'nm_barang' => $b,
			'harga' =>$c,
			'stok' => $d,
			'update_date' => date('Y-m-d H:i:s')
		);
		
		// print_r($data2);
		$model->qedit('barang', $data,$where);

		return redirect()->to ('/ConBarang/barang');
	}

    public function delete_barang($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_barang'=>$id);
            $model->hapus('barang', $where);
            return redirect()->to ('/ConBarang/bin_barang');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }
    
    public function soft_delete_barang($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $where = array('id_barang'=>$id);
            
            $data2 = array(
                'delete_date' => date('Y-m-d H:i:s')
            );
    
            $model->qedit('barang', $data2, $where);
    
            return redirect()->to ('/ConBarang/barang');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function restore_barang($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_barang'=>$id);
            
            $data2 = array(
                'delete_date' => null
            );
    
            $model->qedit('user', $data2, $where);
    
            return redirect()->to ('/ConBarang/bin_barang');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

}