<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table = 'config';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getConfigDetail($id)
    {
        return $this->where('id', $id)->first();
    }

    // Add other methods as needed
}
