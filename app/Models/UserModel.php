<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getMenus()
    {
        return $this->findAll();
    }

    // Add other methods as needed
}
