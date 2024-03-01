<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\AlbumModel;
use App\Models\FotoAlbumModel;
use App\Models\LikeModel;

class User extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $commentModel;
    protected $albumModel;
    protected $fotoAlbumModel;
    protected $likeModel;
    protected $validation;
    protected $session;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->fotoModel = new FotoModel();
        $this->commentModel = new CommentModel();
        $this->albumModel = new AlbumModel();
        $this->fotoAlbumModel = new FotoAlbumModel();
        $this->likeModel = new LikeModel();
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    // method untuk upload gambar
    public function uploadFoto()
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }   
        // ambil title dan description dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        // ambil gambar dari form
        $foto = $this->request->getFile('foto');
        // ambil id_user dari session
        $id_user = $this->session->get('id_user');
        // buat nama gambar menjadi random name
        $nama_foto = $foto->getRandomName();
        // pindahkan gambar ke folder foto_storage
        $foto->move('foto_storage', $nama_foto);
        // simpan data ke database
        $data = [
            'title' => $title,
            'description' => $description,
            'foto' => $nama_foto,
            'id_user' => $id_user
        ];
        $this->fotoModel->insert($data);
        // kembali ke halaman foto
        return redirect()->to('/home');

    }

    // method untuk menampilkan detail foto


    // method untuk menampilkan form edit foto
    public function editFoto($id)
    {
        $data['foto'] = $this->fotoModel->getFoto($id);
        return view('form_edit', $data);
    }

    // method untuk update foto
    public function updateFoto($id)
    {
        // ambil title dan description dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        // ambil gambar dari form
        $foto = $this->request->getFile('foto');
        // ambil nama gambar
        $nama_foto = $foto->getRandomName();
        // pindahkan gambar ke folder foto_storage
        $foto->move('foto_storage', $nama_foto);
        // simpan data ke database
        $data = [
            'title' => $title,
            'description' => $description,
            'foto' => $nama_foto
        ];
        $this->fotoModel->update($id, $data);
        // kembali ke halaman foto
        return redirect()->to('/profile/' . $this->session->get('id_user'));
    }

    // method untuk menghapus foto
    public function deleteFoto($id)
    {
        $foto = $this->fotoModel->find($id);
        unlink('foto_storage/' . $foto['foto']);
        $this->fotoModel->delete($id);
        return redirect()->to('/profile/' . $this->session->get('id_user'));
    }

    // method untuk menambahkan komentar
    public function comment($id)
    {
        // ambil id_user dari session
        $id_user = $this->session->get('id_user');
        // ambil comment dari form
        $comment = $this->request->getPost('comment');
        // simpan data ke database
        $data = [
            'id_foto' => $id,
            'id_user' => $id_user,
            'comment' => $comment
        ];
        $this->commentModel->insert($data);
        return redirect()->back();
    }



    // method untuk menghapus komentar
    public function deleteComment($id)
    {
        $this->commentModel->delete($id);
        return redirect()->back();
    }

    // method untuk update komentar

    // create method to create album
    public function createAlbum()
    {
        // ambil title dan description dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        // ambil gambar dari form
        $foto = $this->request->getFile('foto');
        // ambil id_user dari session
        $id_user = $this->session->get('id_user');
        // buat nama gambar menjadi random name
        $nama_foto = $foto->getRandomName();
        // pindahkan gambar ke folder foto_storage
        $foto->move('foto_storage', $nama_foto);
        // simpan data ke database
        $data = [
            'title_album' => $title,
            'description' => $description,
            'cover_album' => $nama_foto,
            'id_user' => $id_user
        ];
        $this->albumModel->insert($data);
        // kembali ke halaman foto
        return redirect()->to('/profile/' . $this->session->get('id_user'));
    }

    // method to update album
    public function updateAlbum($id)
    {
        // ambil title dan description dari form
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        // ambil gambar dari form
        $foto = $this->request->getFile('foto');
        // ambil nama gambar
        $nama_foto = $foto->getRandomName();
        // pindahkan gambar ke folder foto_storage
        $foto->move('foto_storage', $nama_foto);
        // simpan data ke database
        $data = [
            'title_album' => $title,
            'description' => $description,
            'cover_album' => $nama_foto
        ];
        $this->albumModel->update($id, $data);
        // kembali ke halaman foto
        return redirect()->to('/home');
    }

    //method untuk menambahkan foto ke album
    public function addFotoToAlbum($id)
    {
        $id_album = $this->request->getPost('album');
        if ($id_album) {
            $data = [
                'id_foto' => $id,
                'id_album' => $id_album,
                'id_user' => $this->session->get('id_user')
            ];
            $this->fotoAlbumModel->insert($data);
            return redirect()->back();
        }
    }

    // method untuk menghapus album
    public function deleteAlbum($id)
    {
        $album = $this->albumModel->find($id);
        unlink('foto_storage/' . $album['cover_album']);
        $this->albumModel->delete($id);
        return redirect()->to('/home');
    }

    // method to delete a photo from an album
    public function deleteFotoFromAlbum($id)
    {
        // hapus data dari table fotoalbum yang memiliki id_foto = $id
        $deleted = $this->fotoAlbumModel->where('id_fotoalbum', $id)->delete();

        if ($deleted) {
            // Row deleted successfully
            // You can also perform any additional clean-up or redirection here
            return redirect()->to('/home')->with('success', 'Photo deleted successfully from album.');
        } else {
            // Failed to delete row
            // You can handle this case accordingly, maybe show an error message or redirect back
            return redirect()->back()->with('error', 'Failed to delete photo from album.');
        }
    }

    //method untuk like foto
    public function likeFoto($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }   
        // Cek apakah pengguna sudah menyukai foto
        if (!$this->likeModel->userLikedPhoto($this->session->get('user_id'), $id)) {
            // Jika belum, tambahkan like
            $this->likeModel->addLike($this->session->get('user_id'), $id);
        }

        return redirect()->back();
    }

    public function unlikeFoto($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }   
        // Hapus like jika ada
        $this->likeModel->removeLike($this->session->get('id_user'), $id);

        return redirect()->back();
    }


    // method untuk mengupdate profile
    public function updateProfile($id)
    {
        // ambil data dari form
        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // hash the password
            'alamat' => $this->request->getPost('alamat'), // add this line
            'bio' => $this->request->getPost('bio'), // add this line
            'description' => $this->request->getPost('description') // add this line
        ];

        // ambil foto dari form
        $foto = $this->request->getFile('foto');
        // ambil nama foto
        $nama_foto = $foto->getRandomName();
        // pindahkan foto ke folder foto_storage
        $foto->move('./assets/images/user/', $nama_foto);
        // simpan nama foto ke database
        $data['foto'] = $nama_foto;
        // set session foto dengan nama foto
        $this->session->set('foto', $nama_foto);

        // update data ke database
        $this->userModel->update($id, $data);
        // kembali ke halaman profile
        return redirect()->to('/profile/' . $id);
    }

}
