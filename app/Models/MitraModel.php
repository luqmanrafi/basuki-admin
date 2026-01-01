<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table            = 'mitra';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'jobs', 'address', 'phone'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMonthlyOverview()
    {
        return $this->select('COUNT(id) as count, MONTHNAME(created_at) as month')
            ->where('created_at > DATE_SUB(NOW(), INTERVAL 6 MONTH)', null, false)
            ->groupBy('MONTHNAME(created_at), MONTH(created_at)')
            ->orderBy('MONTH(created_at)', 'ASC')
            ->findAll();
    }

    public function getRecentMitra(int $limit = 5)
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit);
    }
}
