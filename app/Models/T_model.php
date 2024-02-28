<?php namespace App\Models;
use CodeIgniter\Model;

class T_model extends Model
{  
    public function getTrans($id) {
        $query = $this->db->table('transaksi')
            ->select('*, transaksi.create_date as tgl, transaksi.harga as price')
            ->join('barang', 'barang.id_barang = transaksi.barang')
            ->where("transaksi.notrans", $id);

        return $query->get()->getResult();

    }
    
    public function getTransAll() {
        $query = $this->db->table('transaksi')
            ->select('*, transaksi.create_date as tgl, transaksi.harga as price')
            ->join('makanan', 'makanan.id_makanan = transaksi.makanan');

        return $query->get()->getResult();

    }
    
    public function getNoTrans() {
        $query = $this->db->table('notrans')
            ->select('*, DATE(notrans.create_date) as create_date1')
            ->join('pelanggan', 'pelanggan.id_pelanggan = notrans.n_pelanggan')
            ->where("DATE(notrans.create_date)", date('Y-m-d'))
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
    public function getBinNoTrans() {
        $query = $this->db->table('notrans')
            ->select('*, DATE(create_date) as create_date1')
            ->where("notrans.delete_date IS NOT NULL");

        return $query->get()->getResult();

    }
    
    public function filterNoTrans($tgl) {
        $query = $this->db->table('notrans')
            ->select('*, DATE(notrans.create_date) as create_date1')
            ->join('pelanggan', 'pelanggan.id_pelanggan = notrans.n_pelanggan')
            ->where("DATE(notrans.create_date)", $tgl)
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
}