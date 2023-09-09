<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getChild($parentid)
    {
        return $this->where('parentid', $parentid)->findAll();
    }

    // Add other methods as needed
}
