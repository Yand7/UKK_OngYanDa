<?php namespace App\Models;
use CodeIgniter\Model;

class B_model extends Model
{  
    public function getBarang() {
        $query = $this->db->table('barang')
            ->select('*')
            ->where("barang.delete_date IS NULL")
            ->orderBy('barang.id_barang', 'desc');

        return $query->get()->getResult();

    }
    
    
}