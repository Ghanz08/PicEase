<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\FotoModel;
use App\Models\CommentModel;
use App\Models\AlbumModel;
use App\Models\FotoAlbumModel;
use App\Models\LikeModel;

class Home extends BaseController
{
    protected $userModel;
    protected $fotoModel;
    protected $commentModel;
    protected $albumModel;
    protected $likeModel;
    protected $fotoAlbumModel;
    protected $session;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->fotoModel = new FotoModel();
        $this->commentModel = new CommentModel();
        $this->albumModel = new AlbumModel();
        $this->fotoAlbumModel = new FotoAlbumModel();
        $this->likeModel = new LikeModel();
        $this->session = session();
    }

    public function index()
    {
        $searchTerm = $this->request->getPost('searchInput'); // Mendapatkan input pencarian dari form

        // Melakukan pencarian hanya jika input pencarian tidak kosong
        if (!empty($searchTerm)) {
            $data['foto'] = $this->fotoModel->searchByName($searchTerm);
        } else {
            $data['foto'] = $this->fotoModel->getFoto(); // Jika input kosong, tampilkan semua foto
        }
        // ambil dari session id_user lalu munculkan id_user dari table user
        $id_user = $this->session->get('id_user');
        $data['user'] = $this->userModel->getUser($id_user);
        return view('home', $data);
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function create()
    {
        $userid = $this->userModel->getUser();
        $id_user = $this->session->get('id_user');
        $user = $this->userModel->getUser($id_user);

        $data['user'] = $user;
        $data['userid'] = $userid;
        return view('form_create', $data);
    }

    public function profile($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }
        // Cek apakah pengguna sudah menyukai foto
        $liked = $this->likeModel->userLikedPhoto($this->session->get('id_user'), $id);
        $user = $this->userModel->getUser($id);
        $foto = $this->fotoModel->getFotoByUser($id);
        $album = $this->albumModel->getAlbumByUser($id);

        $data['user'] = $user;
        $data['foto'] = $foto;
        $data['album'] = $album;
        $data['liked'] = $liked;
        return view('profile', $data);
    }

    public function detail($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }
        $comment = $this->commentModel->getCommentByFoto($id);
        $foto = $this->fotoModel->getFoto($id);
        $user = $this->userModel->getUser($foto['id_user']);
        $id_user = $this->session->get('id_user');
        $album = $this->albumModel->getAlbumByUser($id_user);
        $liked = $this->likeModel->userLikedPhoto($this->session->get('id_user'), $id);
        $totalLikes = $this->likeModel->countLikes($id);

        $data['comment'] = $comment;
        $data['user'] = $user;
        $data['foto'] = $foto;
        $data['album'] = $album;
        $data['liked'] = $liked;
        $data['totalLikes'] = $totalLikes;
        return view('detail_foto_profile', $data);
    }

    public function detailFoto($id)
    {
        $comment = $this->commentModel->getCommentByFoto($id);
        $foto = $this->fotoModel->getFoto($id);
        $userid = $this->userModel->getUser($foto['id_user']);
        $id_user = $this->session->get('id_user');
        $user = $this->userModel->getUser($id_user);

        $album = $this->albumModel->getAlbumByUser($id_user);
        $liked = $this->likeModel->userLikedPhoto($this->session->get('id_user'), $id);
        $totalLikes = $this->likeModel->countLikes($id);

        $data['comment'] = $comment;
        $data['user'] = $user;
        $data['userid'] = $userid;
        $data['foto'] = $foto;
        $data['album'] = $album;
        $data['liked'] = $liked;
        $data['totalLikes'] = $totalLikes;
        return view('detail_foto', $data);
    }

    public function editFoto($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }
        $foto = $this->fotoModel->getFoto($id);
        $userid = $this->userModel->getUser($id);
        $id_user = $this->session->get('id_user');
        $user = $this->userModel->getUser($id_user);
        $data['user'] = $user;
        $data['userid'] = $userid;
        $data['foto'] = $this->fotoModel->getFoto($id);
        return view('form_edit', $data);
    }

    public function create_album()
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }
        return view('form_create_album');
    }

    public function detailAlbum($id)
    {
        $fotos = $this->fotoAlbumModel->where('id_album', $id)->findAll();
        $album = $this->fotoModel->getFotoByAlbum($id);
        $albums = $this->albumModel->getAlbum($id);
        $user = $this->userModel->getUser($albums['id_user']);
        $data['user'] = $user;
        $data['album'] = $album;
        $data['albums'] = $albums;
        $data['fotos'] = $fotos;


        // dd($album);
        // die;

        return view('detail_album', $data);
    }

    public function detailFotoAlbum($id)
    {
        // Fetching necessary data
        $fotos = $this->fotoAlbumModel->where('id_fotoalbum', $id)->first();
        $foto = $this->fotoModel->where('id_foto', $fotos['id_foto'])->first();
        $comment = $this->commentModel->getCommentByFotoAlbum($fotos['id_album']);
        $userid = $this->userModel->getUser($foto['id_user']);
        $id_user = $this->session->get('id_user');
        $user = $this->userModel->getUser($id_user);
        $id_user = $this->session->get('id_user');
        $album = $this->albumModel->getAlbumByUser($id_user);

        // Fetch total likes and whether the logged-in user has liked the photo
        $totalLikes = $this->likeModel->countLikesInDetailFotoAlbum($fotos['id_foto']);
        $liked = $this->likeModel->userLikedPhotoInDetailFotoAlbum(session()->get('id_user'), $fotos['id_foto']);

        // Passing data to the view
        $data = [
            'comment' => $comment,
            'user' => $user,
            'userid' => $userid,
            'foto' => $foto,
            'album' => $album,
            'fotos' => $fotos,
            'totalLikes' => $totalLikes,
            'liked' => $liked
        ];

        return view('detail_foto_album', $data);
    }

    //edit album
    public function editAlbum($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }
        $userid = $this->userModel->getUser();
        $id_user = $this->session->get('id_user');
        $user = $this->userModel->getUser($id_user);
        $data['user'] = $user;
        $data['userid'] = $userid;
        $data['album'] = $this->albumModel->getAlbum($id);
        return view('form_edit_album', $data);
    }

    public function editProfile($id)
    {
        if (!$this->session->get('logged_in')) {
            $this->session->setFlashdata('error', 'Silakan login untuk mengakses fitur ini.');
            return redirect()->to('/login');
        }
        $userid = $this->userModel->getUser();
        $id_user = $this->session->get('id_user');
        $user = $this->userModel->getUser($id_user);
        $data['user'] = $user;
        $data['userid'] = $userid;
        $data['user'] = $this->userModel->getUser($id);
        return view('form_edit_profile', $data);
    }

}
