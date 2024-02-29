<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\T_model;
use App\Models\H_model;


class ConTrans extends BaseController
{
    public function transaksi(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new T_model();
            $data['t'] = $model->getNoTrans();
    
            echo view('header');
            echo view('menu');
            echo view('transaksi', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function bin_trans(){
        if(session()->get('level')==1) {
            $model = new T_model();
            $data['t'] = $model->getBinNoTrans();
    
            echo view('header');
            echo view('menu');
            echo view('bin_trans', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function filter_trans(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $a = $this -> request-> getPost('tgl');

            $model = new T_model();
            $data['t'] = $model->filterNoTrans($a);
    
            echo view('header');
            echo view('menu');
            echo view('transaksi', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}
    
    public function det_transaksi($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new T_model();
            $data['t'] = $model->getTrans($id);
            $data['ntr'] = $id;
    
            echo view('header');
            echo view('menu');
            echo view('det_trans', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function e_trans($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
    
            $where = array('id_ntr'=>$id);
            $data['t'] = $model->getWhere('notrans', $where);
            
    
            echo view('header');
            echo view('menu');
            echo view('e_trans', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	
    }

    public function output_etrans(){
		$id = $this -> request-> getPost('ide');
		$a = $this -> request-> getPost('s');
		$b = $this -> request-> getPost('p');
		$c = $this -> request-> getPost('b');
		$d = $this -> request-> getPost('k');


		$model = new H_Model();
		$where=array('id_ntr'=>$id);
		$data = array(
			'status' => $a,
			'payment' => $b,
			'bayar' => $c,
			'kembali' => $d,
			'update_date' => date('Y-m-d H:i:s')
		);

		// print_r($id);
		$model->qedit('notrans', $data,$where);

		return redirect()->to ('/ConTrans/transaksi');
	}

    public function delete_trans($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_ntr'=>$id);
            $data['t'] = $model->getWhere('notrans', $where);

            $where2 = array('notrans'=>$data['t']->ntr);

            $model->hapus('transaksi', $where2);
            $model->hapus('notrans', $where);
            return redirect()->to ('/ConTrans/bin_trans');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }
    
    public function soft_delete_trans($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $where = array('id_ntr'=>$id);
            
            $data2 = array(
                'delete_date' => date('Y-m-d H:i:s')
            );
    
            $model->qedit('notrans', $data2, $where);

            $data['t'] = $model->getWhere('notrans', $where);

            $where2 = array('notrans'=>$data['t']->ntr);
            $model->qedit('transaksi', $data2, $where2);

            return redirect()->to ('/ConTrans/transaksi');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function restore_trans($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_ntr'=>$id);
            
            $data2 = array(
                'delete_date' => null
            );
    
            $model->qedit('notrans', $data2, $where);

            $data['t'] = $model->getWhere('notrans', $where);

            $where2 = array('notrans'=>$data['t']->ntr);
            $model->qedit('transaksi', $data2, $where2);
    
            return redirect()->to ('/ConTrans/bin_trans');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function outbound(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new T_model();
            $data['ta'] = $model->getOutbound();
    
            echo view('header');
            echo view('menu');
            echo view('outbound', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function bin_outbound(){
        if(session()->get('level')==1) {
            $model = new T_model();
            $data['ta'] = $model->getBinOutbound();
    
            echo view('header');
            echo view('menu');
            echo view('bin_outbound', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function t_out(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            
            echo view('header');
            echo view('menu');
            echo view('t_out');
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
        
    }

    public function output_tout(){
		$a = $this -> request-> getPost('kt');
		$b = $this -> request-> getPost('jp');
		
		$model=new H_model();
        $to = $model->getNoOut();

		$data = array(
			'ntr_out' => $to,
			'keterangan' => $a,
			'jumlah' => $b,
			'create_date' => date('Y-m-d H:i:s')
		);

		// print_r($data);
		$model->simpan('outbound',$data);		

		return redirect()->to ('/ConTrans/outbound');
    }

    public function delete_outbound($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_out'=>$id);
            $model->hapus('outbound', $where);
            return redirect()->to ('/ConTrans/bin_outbound');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function soft_delete_out($id){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new H_model();
            $where = array('id_out'=>$id);
            
            $data2 = array(
                'delete_date' => date('Y-m-d H:i:s')
            );
    
            $model->qedit('outbound', $data2, $where);
    
            return redirect()->to ('/ConTrans/outbound');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function restore_outbound($id){
        if(session()->get('level')==1) {
            $model = new H_model();
            $where = array('id_out'=>$id);
            
            $data2 = array(
                'delete_date' => null
            );
    
            $model->qedit('outbound', $data2, $where);
    
            return redirect()->to ('/ConTrans/bin_outbound');
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function filter_outbound(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $a = $this -> request-> getPost('tgl');

            $model = new T_model();
            $data['ta'] = $model->filterOutbound($a);
    
            echo view('header');
            echo view('menu');
            echo view('outbound', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}
}