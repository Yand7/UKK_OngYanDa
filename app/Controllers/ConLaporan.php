<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\H_model;
use App\Models\T_model;
use App\Models\M_model;
use Dompdf\Dompdf;

class ConLaporan extends BaseController
{

    public function laporan_pemasukan(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new T_model();
            $data['ta'] = $model->getTransAll();
            $data['nt'] = $model->getNoTrans();
            $data['tgl'] = date('Y-m-d');

    
            echo view('header');
            echo view('menu');
            echo view('laporan', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}
    
    public function filter_laporan_pemasukan(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $a = $this -> request-> getPost('tgl');

            $model = new T_model();
            $data['ta'] = $model->getTransAll();
            $data['nt'] = $model->filterNoTrans($a);
            $data['tgl'] = $a;
    
            echo view('header');
            echo view('menu');
            echo view('laporan', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function pdf_pemasukan(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $tgl = $this->request->getGet('tgl');
            
            $model = new T_model();
            
            if($tgl == null){
                $data['ta'] = $model->getTransAll();
                $data['nt'] = $model->getNoTrans();
            } else if ($tgl != null){
                $data['ta'] = $model->getTransAll();
                $data['nt'] = $model->filterNoTrans($tgl);
            }
            
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('pdf_pemasukan', $data));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('laporan pemasukan.pdf', array('Attachment' => false));
            exit();
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }
    
    public function laporan_pengeluaran(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $model = new T_model();
            $data['ta'] = $model->getOutbound();
            $data['tgl'] = date('Y-m-d');

    
            echo view('header');
            echo view('menu');
            echo view('laporan_out', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function filter_pengeluaran(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $a = $this -> request-> getPost('tgl');

            $model = new T_model();
            $data['ta'] = $model->filterOutbound($a);
            $data['tgl'] = $a;

    
            echo view('header');
            echo view('menu');
            echo view('laporan_out', $data);
            echo view('footer');
        
        }else{
            return redirect()->to('/Home/log_out');
        }
	}

    public function pdf_pengeluaran(){
        if(session()->get('level')==1 || session()->get('level')==2) {
            $tgl = $this->request->getGet('tgl');
            
            $model = new T_model();
            
            if($tgl == null){
                $data['ta'] = $model->getOutbound();
            } else if ($tgl != null){
                $data['ta'] = $model->filterOutbound($tgl);
            }
            
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('pdf_pengeluaran', $data));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream('laporan pengeluaran.pdf', array('Attachment' => false));
            exit();
        
        }else{
            return redirect()->to('/Home/log_out');
        }
    }

    public function diagram(){
        $model = new T_model();
        $data['out'] = $model->getOutbound12();
        $data['nt'] = $model->getNoTrans12();

        // print_r($data['nt']);
        echo view('header');
        echo view('menu');
        echo view('diagram', $data);
        echo view('footer');
    }
}