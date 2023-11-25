<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'groups';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_group'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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

    public function getAll($id = null)
    {
        if ($id == null) {
            return $this->get()->getResult();
        } else {
            return $this->where('id', $id)->get()->getRow();
        }
    }

    public function insertUpdate($data, $id = null)
    {
        $this->transStart();
        $saveData = $this->save([
            'id'            => $id,
            'nama_group'    => $data['nama_group']
        ]);
        $this->transComplete();

        return $saveData;
    }

    public function destroy($id)
    {
        return $this->where('id', $id)->delete();
    }
}
