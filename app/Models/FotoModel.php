<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table = 'foto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_foto';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_foto', 'title', 'description', 'foto', 'id_user'];

    public function getFoto($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_foto' => $id])->first();
    }

    public function getFotoByUser($id)
    {
        return $this->where(['id_user' => $id])->findAll();
    }

    public function getFotoById($id)
    {
        return $this->find($id);
    }

    public function countPostsById(int $id): int
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->countAllResults();
    }

    public function getFotoByAlbum($id)
    {
        return $this->select('foto.*, album.*')
            ->join('fotoalbum', 'fotoalbum.id_foto = foto.id_foto')
            ->join('album', 'album.id_album = fotoalbum.id_album')
            ->where(['fotoalbum.id_album' => $id])
            ->findAll();
    }
}


