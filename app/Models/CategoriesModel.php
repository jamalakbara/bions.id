<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        // Define your allowed fields here
    ];

    public function getCategories()
    {
        return $this->findAll();
    }

    public function getCategoriesByModule($module)
    {
        return $this->where('modules', $module)->findAll();
    }

    public function getConfigDetail($id)
    {
        return $this->where('id', $id)->first();
    }

    // Add other methods as needed
}
