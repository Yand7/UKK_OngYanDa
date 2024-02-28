<?php namespace App\Models;
use CodeIgniter\Model;

class C_model extends Model
{  
    public function getCart() {
        $query = $this->db->table('cart')
            ->select('*')
            ->join('barang', 'barang.id_barang = cart.barang')
            ->join('user', 'user.id_user = cart.user')
            ->where("cart.user", session()->get('id'))
            ->orderBy('id_cart', 'desc');

        return $query->get()->getResult();

    }
    
}