<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'username', 'email', 'alamat', 'password', 'foto', 'description', 'bio', 'active' ];

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id])->first();
    }

    public function getUserById($id_user)
    {
        return $this->where(['id_user' => $id_user])->first();
    }

    public function getUserBySession()
    {
        $session = session();
        $id_user = $session->get('id_user');
        return $this->getUserById($id_user);
    }
    

    

}