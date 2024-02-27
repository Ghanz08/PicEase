<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoAlbumModel extends Model
{
    protected $table = 'fotoalbum';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_fotoalbum';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_fotoalbum', 'id_foto', 'id_album', 'id_user'];

    public function getFotoAlbum($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_fotoalbum' => $id])->first();
    }

    public function getIdFotoAlbum($id)
    {
        return $this->where('id_fotoalbum', $id)->first();
    }

    public function getFotoAlbumById($id)
    {
        return $this->find($id);
    }

}