<?php namespace App\Models;
use CodeIgniter\Model;

class H_model extends Model
{  
    public function tampil($table){
        return $this->db->table($table)->get()->getResult();
    }
    
    public function hapus($table, $where){
        return $this->db->table($table)->delete($where);
    }

    public function simpan($table, $data){
        return $this->db->table($table)->insert($data);
    }
    
    public function simpanAll($table, $data){
        return $this->db->table($table)->insertBatch($data);
    }

    public function ok($table, $data){
        return $this->db->table($table)->insertBatch($data);
    }

    public function getWhere($table, $where){
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function getWhere2($table, $where){
		return $this->db->table($table)->getWhere($where)->getRowArray();
	}

    public function qedit($table, $data, $where){
        return $this->db->table($table)->update($data, $where);
    }
    
    public function editAll($table, $data){
        return $this->db->table($table)->updateBatch($data);
    }

    public function getNoTrans() {
        $prefix = 'TRN';

        $randomPart = $this->generateRandomString(4); 

        $invoiceNumber = $prefix . $randomPart;

        return $invoiceNumber;
    }
   
    public function getKdBarang() {
        $prefix = 'BRG';

        $randomPart = $this->generateRandomString(4); 

        $invoiceNumber = $prefix . $randomPart;

        return $invoiceNumber;
    }

    public function getNoOut() {
        $prefix = 'OUT';

        $randomPart = $this->generateRandomString(4); 

        $invoiceNumber = $prefix . $randomPart;

        return $invoiceNumber;
    }

    private function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}