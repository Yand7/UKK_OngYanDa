<?php namespace App\Models;
use CodeIgniter\Model;

class S_model extends Model
{  
    public function getStok() {
        $query = $this->db->table('stok')
            ->select('*, stok.create_date as inputDate')
            ->join('barang','barang.kd_barang=stok.barang')
            ->where("stok.delete_date IS NULL")
            ->orderBy('stok.id', 'desc');

        return $query->get()->getResult();

    }
    
    public function getBinStok() {
        $query = $this->db->table('stok')
        ->select('*, stok.create_date as inputDate, stok.delete_date as delete_date1')
        ->join('barang','barang.kd_barang=stok.barang')
        ->where("stok.delete_date IS NOT NULL")
        ->orderBy('stok.id', 'desc');

    return $query->get()->getResult();

    }
}