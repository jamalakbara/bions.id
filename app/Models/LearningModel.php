<?php

namespace App\Models;

use CodeIgniter\Model;

class LearningModel extends Model
{
    protected $table = 'learning';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getConfigDetail($id)
    {
        return $this->where('id', $id)->first();
    }

    public function lihat($sampai, $dari, $catid)
    {
        $builder = $this->db->table($this->table);
        $builder->orderBy('id', 'DESC');

        if ($catid != 0) {
            $builder->where('catid', $catid);
            $builder->orderBy('tanggal', 'DESC');
        }

        $builder->limit($sampai, $dari);

        return $builder->get()->getResult();
    }

    public function jumlah($catid)
    {
        $builder = $this->db->table($this->table);
        
        if ($catid != 0) {
            $builder->where('catid', $catid);
        }

        return $builder->countAllResults();
    }

    // Add other methods as needed
}
