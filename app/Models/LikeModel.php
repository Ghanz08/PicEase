<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table = 'like';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_like';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_like', 'id_foto', 'id_user'];

    public function addLike($id_user, $id_foto)
    {
        $data = [
            'id_user' => $_SESSION['id_user'],
            'id_foto' => $id_foto
        ];

        return $this->insert($data);
    }

    public function countLikes($id_foto)
    {
        return $this->where('id_foto', $id_foto)->countAllResults();
    }

    public function countLikesInDetailFotoAlbum($id_foto)
    {
        return $this->join('foto', 'foto.id_foto = like.id_foto')
                    ->where('like.id_foto', $id_foto)
                    ->countAllResults();
    }

    public function userLikedPhoto($id_user, $id_foto)
    {
        return $this->where('id_user', $id_user)->where('id_foto', $id_foto)->countAllResults() > 0;
    }

    public function userLikedPhotoInDetailFotoAlbum($id_user, $id_foto)
    {
        return $this->join('fotoalbum', 'fotoalbum.id_foto = like.id_foto')
                    ->where('like.id_user', $id_user)
                    ->where('like.id_foto', $id_foto)
                    ->countAllResults() > 0;
    }

    public function removeLike($id_user, $id_foto)
    {
        return $this->where('id_user', $id_user)->where('id_foto', $id_foto)->delete();
    }
}
