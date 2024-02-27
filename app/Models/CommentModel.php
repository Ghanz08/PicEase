<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comment';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_comment';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_comment', 'id_foto', 'id_user', 'comment'];

    public function getComment($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_comment' => $id])->first();
    }

    public function getCommentByFoto($id)
    {
        return $this->select('comment.*, user.username')
            ->join('user', 'user.id_user = comment.id_user')
            ->where(['id_foto' => $id])
            //call the lastest comment
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    // ger comment by fotoalbum
    public function getCommentByFotoAlbum($id)
    {
        return $this->select('comment.*, user.username')
            ->join('user', 'user.id_user = comment.id_user')
            ->join('foto', 'foto.id_foto = comment.id_foto')
            ->join('fotoalbum', 'fotoalbum.id_foto = foto.id_foto')
            ->where(['fotoalbum.id_album' => $id])
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    // get comment by user_id
    public function getCommentByUser($id)
    {
        return $this->where(['id_user' => $id])->findAll();
    }

    public function getCommentById($id)
    {
        return $this->find($id);
    }

    public function countPostsById(int $id): int
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->countAllResults();
    }
}