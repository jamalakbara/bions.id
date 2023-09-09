<?php

namespace App\Models;

use CodeIgniter\Model;

class BotMenuModel extends Model
{
    protected $table = 'botmenu';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getBotMenus()
    {
        return $this->findAll();
    }

    // Add other methods as needed
}
