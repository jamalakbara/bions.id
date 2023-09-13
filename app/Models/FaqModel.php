<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getFaqsByCategory($catid)
    {
        return $this->where('catid', $catid)->findAll();
    }

    public function getConfigDetail($id)
    {
        return $this->where('id', $id)->first();
    }

    // Add other methods as needed
}
