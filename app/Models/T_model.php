<?php namespace App\Models;
use CodeIgniter\Model;

class T_model extends Model
{  
    public function getTrans($id) {
        $query = $this->db->table('transaksi')
            ->select('*, transaksi.create_date as tgl')
            ->join('wahana', 'wahana.id_wahana = transaksi.wahana')
            ->where("transaksi.notrans", $id);

        return $query->get()->getResult();

    }
    
    public function getTransAll() {
        $query = $this->db->table('transaksi')
            ->select('*, transaksi.create_date as tgl')
            ->join('notrans', 'notrans.ntr = transaksi.notrans')
            ->join('anak', 'anak.id_anak = notrans.n_pelanggan')
            ->join('wahana', 'wahana.id_wahana = transaksi.wahana');

        return $query->get()->getResult();

    }
    
    public function getNota($id) {
        $query = $this->db->table('notrans')
            ->select('*, notrans.create_date as create_date1')
            ->join('anak', 'anak.id_anak = notrans.n_pelanggan')
            ->join('transaksi', 'transaksi.notrans = notrans.ntr')
            ->join('wahana', 'wahana.id_wahana = transaksi.wahana')
            ->where("notrans.ntr", $id)
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getRow();

    }
    
    public function getNoTrans2() {
        $query = $this->db->table('notrans')
            ->select('*, notrans.create_date as create_date1, notrans.status as status1')
            ->join('anak', 'anak.id_anak = notrans.n_pelanggan')
            ->where("DATE(notrans.create_date)", date("Y-m-d"))
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
    public function getNoTrans() {
        $query = $this->db->table('notrans')
            ->select('*, DATE(notrans.create_date) as create_date1, notrans.status as status1')
            ->join('anak', 'anak.id_anak = notrans.n_pelanggan')
            ->where("DATE(notrans.create_date)", date("Y-m-d"))
            ->where("notrans.status = ", "Done")
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
    public function getBinNoTrans() {
        $query = $this->db->table('notrans')
            ->select('*, notrans.create_date as create_date1, notrans.status as status1')
            ->join('anak', 'anak.id_anak = notrans.n_pelanggan')
            ->where("notrans.delete_date IS NOT NULL");

        return $query->get()->getResult();

    }
    
    public function filterNoTrans($tgl) {
        $query = $this->db->table('notrans')
            ->select('*, DATE(create_date) as create_date1')
            ->where("DATE(create_date)", $tgl)
            ->where("notrans.status = ", "Done")
            ->where("notrans.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
    public function filterOutbound($tgl) {
        $query = $this->db->table('outbound')
            ->select('*, DATE(outbound.create_date) as create_date1')
            ->where("DATE(create_date)", $tgl)
            ->where("outbound.delete_date IS NULL");

        return $query->get()->getResult();

    }
    
    public function getOutbound() {
        $query = $this->db->table('outbound')
            ->select('*, DATE(outbound.create_date) as create_date1')
            ->where("DATE(outbound.create_date)", date("Y-m-d"))
            ->where("outbound.delete_date IS NULL");

        return $query->get()->getResult();

    }
}