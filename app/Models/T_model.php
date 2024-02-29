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
            ->join('barang', 'barang.id_barang = transaksi.barang');

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
            ->select('*, DATE(notrans.create_date) as create_date1, notrans.delete_date as delete_date1')
            ->join('pelanggan', 'pelanggan.id_pelanggan = notrans.n_pelanggan')
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
    
    public function getOutbound() {
        $query = $this->db->table('outbound')
            ->select('*, DATE(outbound.create_date) as create_date1')
            ->where("DATE(outbound.create_date)", date("Y-m-d"))
            ->where("outbound.delete_date IS NULL");

        return $query->get()->getResult();

    }

    public function getBinOutbound() {
        $query = $this->db->table('outbound')
            ->select('*, DATE(outbound.create_date) as create_date1')
            ->where("outbound.delete_date IS NOT NULL");

        return $query->get()->getResult();

    }

    public function filterOutbound($tgl) {
        $query = $this->db->table('outbound')
            ->select('*, DATE(outbound.create_date) as create_date1')
            ->where("DATE(create_date)", $tgl)
            ->where("outbound.delete_date IS NULL");

        return $query->get()->getResult();

    }


    public function getNoTrans12() {
        $query = $this->db->table('notrans')
            ->select('*, DATE(notrans.create_date) as create_date1')
            ->where("YEAR(notrans.create_date)", date('Y'))
            ->where("notrans.status =","Paid")
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getResult();

    }

    public function getOutbound12() {
        $query = $this->db->table('outbound')
            ->select('*, DATE(outbound.create_date) as create_date1')
            ->where("YEAR(outbound.create_date)", date('Y'))
            ->where("outbound.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
}