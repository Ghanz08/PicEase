<?php

namespace App\Controllers;

use App\Models\UserModel;


class Auth extends BaseController
{
    protected $userModel;
    protected $validation;
    protected $session;
    public function __construct()
    {
        $this->userModel = new UserModel();
        //meload validation
        $this->validation = \Config\Services::validation();
        //meload session
        $this->session = session();
    }
    public function valid_register()
{
    //ambil data dari form
    $nama = $this->request->getPost('nama');
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');
    $alamat = $this->request->getPost('alamat');
    $password = $this->request->getPost('password');
    $foto = 'default.jpg';
    $confirm_password = $this->request->getPost('confirm_password');

    //validasi data
    $data = [
        'nama' => $nama,
        'username' => $username,
        'email' => $email,
        'alamat' => $alamat,
        'password' => $password,
        'confirm_password' => $confirm_password,
    ];

    // Menjalankan validasi dengan rule set 'valid_register'
    if (!$this->validation->run($data, 'valid_register')) {
        // Jika validasi gagal, ambil semua kesalahan validasi
        $errors = $this->validation->getErrors();

        // Menampilkan pesan kesalahan sesuai dengan aturan validasi
        $errorMessages = [];
        if (isset($errors['username'])) {
            $errorMessages[] = 'Username harus memiliki panjang antara 5 dan 255 karakter.';
        }
        if (isset($errors['email'])) {
            $errorMessages[] = 'Format email tidak valid.';
        }
        if (isset($errors['password'])) {
            $errorMessages[] = 'Password harus memiliki panjang minimal 8 karakter.';
        }
        if (isset($errors['confirm_password'])) {
            $errorMessages[] = 'Konfirmasi password tidak cocok dengan password.';
        }

        // Set flash data dengan pesan kesalahan yang dihasilkan
        session()->setFlashdata('errors', $errorMessages);
        return redirect()->to('/register');
    } else {
        // Jika semua validasi berhasil, cek kesesuaian password
        if ($password != $confirm_password) {
            session()->setFlashdata('errors', ['Password dan Confirm Password harus sama!!']);
            return redirect()->to('/register');
        } else {
            // Jika password cocok, lanjutkan proses registrasi
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(10));

            // Simpan data ke database
            $data = [
                'nama' => $nama,
                'username' => $username,
                'email' => $email,
                'alamat' => $alamat,
                'password' => $password_hash,
                'foto' => $foto,
                'active' => $token,
            ];
            $simpan = $this->userModel->insert($data);
            $user = $this->userModel->where('email', $email)->first();

            // Kirim email aktivasi
            $email = \Config\Services::email();
            $email->setTo($data['email']);
            $email->setFrom('gzulhusniganteng@gmail.com', 'Picease Official');
            $email->setSubject('Registrasi Akun');
            $email->setMessage('Selamat Datang ' . $data['nama'] . ' di Picease, akun anda berhasil dibuat. Silahkan Activasi akun anda dengan klik link berikut :' . base_url() . 'auth/activate/' . $token);
            $email->send();

            if ($simpan) {
                session()->setFlashdata('success', 'Register berhasil! Silahkan aktivasi akun anda di email anda');
                return redirect()->to('/login');
            }
        }
    }
}


    public function valid_login()
    {
        //ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //validasi data
        $data = [
            'username' => $username,
            'password' => $password,
        ];
        if (!$this->validation->run($data, 'valid_login')) {
            //jika validasi gagal
            session()->setFlashdata('errors', $this->validation->getErrors());
            return redirect()->to('/login');
        } else {
            //jika validasi berhasil
            $cek_login = $this->userModel->where('username', $username)->first();
            if ($cek_login) {
                if (password_verify($password, $cek_login['password'])) {
                    //jika password benar
                    if ($cek_login['active'] == 'true') {
                        // Kolom 'active' sudah berisi 'true'
                        $session_data = [
                            'id_user' => $cek_login['id_user'],
                            'nama' => $cek_login['nama'],
                            'username' => $cek_login['username'],
                            'email' => $cek_login['email'],
                            'alamat' => $cek_login['alamat'],
                            'foto' => $cek_login['foto'],
                            'logged_in' => TRUE,
                            'active' => $cek_login['active'],
                        ];
                        $this->session->set($session_data);
                        return redirect()->to('/home');
                    } else {
                        // Kolom 'active' belum berisi 'true'
                        session()->setFlashdata('errors', ['Akun Anda belum diverifikasi. Silakan periksa email Anda untuk aktivasi.']);
                        return redirect()->to('/login');
                    }
                } else {
                    //jika password salah
                    session()->setFlashdata('errors', ['Password yang anda masukkan salah']);
                    return redirect()->to('/login');
                }
            } else {
                //jika username tidak ditemukan
                session()->setFlashdata('errors', ['Username tidak ditemukan']);
                return redirect()->to('/login');
            }
        }
    }


    public function activate($token)
    {
        if ($token) {
            $user = $this->userModel->where(['active' => $token])->first();
            if ($user) {
                $this->userModel->save([
                    'id_user' => $user['id_user'],
                    'active' => 'true'
                ]);

                session()->setFlashdata('pesan', 'Akun berhasil diaktivasi');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('pesan', 'Token tidak ditemukan');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('pesan', 'Token tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
