<?php namespace App\Models;
use CodeIgniter\Model;

class P_model extends Model
{  
    public function getPelanggan() {
        $query = $this->db->table('pelanggan')
            ->select('*')
            ->where("pelanggan.delete_date IS NULL")
            ->orderBy('id_pelanggan', 'desc');

        return $query->get()->getResult();

    }
    
    public function getPelanggan2() {
        $query = $this->db->table('pelanggan')
            ->select('*')
            ->where("pelanggan.status=0")
            ->where("pelanggan.delete_date IS NULL")
            ->orderBy('id_pelanggan', 'desc');

        return $query->get()->getResult();

    }

}