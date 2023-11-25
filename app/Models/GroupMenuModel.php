<?php

namespace App\Models;

use CodeIgniter\Model;

class GroupMenuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'groupmenus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['allow_view', 'allow_create', 'allow_edit', 'allow_delete', 'allow_import', 'allow_export', 'id_group', 'id_menu'];

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

    public function getGroupmenubyFKey($id_group, $id_menu)
    {
        return $this->where(["id_group" => $id_group, "id_menu" => $id_menu])->get()->getRow();
    }

    public function insertGroupmenu($data)
    {
        $this->transStart();
        $saveData = $this->save([
            'allow_view'    => $data['allow_view'] ?? false,
            'allow_create'  => $data['allow_create'] ?? false,
            'allow_edit'    => $data['allow_edit'] ?? false,
            'allow_delete'  => $data['allow_delete'] ?? false,
            'allow_import'  => $data['allow_import'] ?? false,
            'allow_export'  => $data['allow_export'] ?? false,
            'id_group'      => $data['id_group'],
            'id_menu'       => $data['id_menu']
        ]);
        $this->transComplete();

        return $saveData;
    }

    public function getAllMenu($data = null)
    {
        $selectData = [
            'groups.nama_group',
            'menus.kategori', 'menus.urutan', 'menus.ikon', 'menus.nama_menu', 'menus.nama_url',
            'groupmenus.id', 'groupmenus.allow_view', 'groupmenus.allow_create', 'groupmenus.allow_edit', 'groupmenus.allow_delete', 'groupmenus.allow_import', 'groupmenus.allow_export', 'groupmenus.id_group', 'groupmenus.id_menu'
        ];
        
        if ($data == "#") {
            return $this->select($selectData)
                        ->join('groups', 'groupmenus.id_group = groups.id')
                        ->join('menus', 'groupmenus.id_menu = menus.id')
                        ->orderBy('id', 'ASC')
                        ->where(['urutan' => $data, 'id_group' => session()->group])->get()->getResult();
        } else {
            return $this->select($selectData)
                        ->join('groups', 'groupmenus.id_group = groups.id')
                        ->join('menus', 'groupmenus.id_menu = menus.id')
                        ->orderBy('urutan', 'ASC')
                        ->where(['kategori' => $data, 'urutan !=' => "#", 'id_group' => session()->group])
                        ->get()->getResult();
        }
    }

    public function destroyGroupmenubyFKey($id_group, $id_menu)
    {
        return $this->where(["id_group" => $id_group,"id_menu" => $id_menu])->delete();
    }
}
