<?php 

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table = 'album';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_album';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_album', 'title_album', 'description', 'cover_album', 'id_user'];

    public function getAlbum($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_album' => $id])->first();
    }

    public function getAlbumByUser($id)
    {
        return $this->where(['id_user' => $id])->findAll();
    }

    public function getAlbumById($id)
    {
        return $this->find($id);
    }

    public function countPostsById(int $id): int
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->countAllResults();
    }

    public function getAlbumByFoto($id)
    {
        return $this->select('album.*, user.username')
            ->join('user', 'user.id_user = album.id_user')
            ->where(['id_album' => $id])
            ->findAll();
    }

    public function getAlbumBySessionUser()
    {
        $session = \Config\Services::session();
        $id_user = $session->get('id_user');
        return $this->where(['id_user' => $id_user])->findAll();
    }
    

    
}