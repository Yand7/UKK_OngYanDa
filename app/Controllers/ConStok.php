<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\U_model;
use App\Models\B_model;
use App\Models\S_model;

class ConStok extends BaseController
{
 
    public function stok(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new S_model();
            $data['s'] = $model->getStok();
    
            echo view('header');
            echo view('menu');
            echo view('stok', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function t_stok(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new B_model();
            $data['b'] = $model->getBarang();
            
            echo view('header');
            echo view('menu');
            echo view('t_stok', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
        
    }

    public function output_tstok(){
		$b = $this -> request-> getPost('b');
		$c = $this -> request-> getPost('q');
		
        $model = new H_model();

		$data = array(
			'tgl' => date('Y-m-d'),
			'barang' =>$b,
			'quantity' => $c,
			'create_date' => date('Y-m-d H:i:s')
		);

		// print_r($data);
		$model->simpan('stok',$data);		

		return redirect()->to ('/ConStok/stok');
    }

    public function delete_stok($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_stok'=>$id);
            $model->hapus('barang', $where);
            return redirect()->to ('/ConBarang/bin_stok');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }
    
    public function soft_delete_stok($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $where = array('id'=>$id);
            
            $data2 = array(
                'delete_date' => date('Y-m-d H:i:s')
            );
    
            $model->qedit('stok', $data2, $where);
    
            return redirect()->to ('/ConStok/stok');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

}