<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\C_model;

class ConCart extends BaseController
{

    public function add_cart(){
		$id = $this -> request-> getPost('ide');
		$a = $this -> request-> getPost('jmlh');
		
		$model=new H_model();

		$data = array(
			'barang' => $id,
			'jumlah' => $a,
			'user' => session()->get('id'),
			'create_date' => date('Y-m-d H:i:s')
		);

		// print_r($data);
		$model->simpan('cart',$data);		

		return redirect()->to ('/Home/mpg');
    }

 
    public function delete_cart($id)
{
    if (session()->get('level') > 0) {
        $model = new H_model();
        $where = array('id_cart' => $id);
        $model->hapus('cart', $where);

        return $this->response->setJSON(['success' => true]);
    } else {
        return $this->response->setJSON(['success' => false, 'error' => 'Unauthorized']);
    }
}

    public function checkout(){
        $a = $this -> request-> getPost('brg');
        $b = $this -> request-> getPost('jmlh');
        $c = $this -> request-> getPost('ttl');
        $d = $this -> request-> getPost('gt');
        $e = $this -> request-> getPost('pl');
        
        $model=new H_model();
        $ntr = $model->getNoTrans();

        $data2 = array(
			'ntr' => $ntr,
            'n_pelanggan'=> $e,
			'status' => 'Pending',
			'nominal' => $d,
			'create_date' => date('Y-m-d H:i:s')
		);

		
		$model->simpan('notrans',$data2);	


        $data = [];
        foreach ($a as $key => $value) {
            $data[] = array(
                'notrans' => $ntr,
                'barang' => $value,
                'jumlah' => $b[$key], 
                'harga' => $c[$key], 
                'create_date' => date('Y-m-d H:i:s')
            );

        }
        $model->simpanAll('transaksi',$data);
        // print_r($data);

        $where = array('user' => session()->get('id'));
        $model->hapus('cart', $where);
        
        return redirect()->to ('/ConTrans/transaksi');
    }

    
}