<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;

class Sign extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $dataPage = [
            'title' => "Urievent | Login"
        ];

        $view = view('sign/signin', $dataPage);

        return $this->response->setBody($view);
        }


    public function signIn(): RedirectResponse
    {
        $session = session();
        $user_email = $this->request->getVar('user_email');
        $password = $this->request->getVar('password');
        $data = $this->userModel->where('email_user', $user_email)->orWhere('username_user', $user_email)->first();

        if ($data) {
            $pass = $data['password_user'];
            if ($password == $pass) {
                $ses_data = [
                    'id_user' => $data['id_user'],
                    'nama_user' => $data['nama_user'],
                    'username_user' => $data['username_user'],
                    'email_user' => $data['email_user'],
                    'password_user' => $data['password_user'],
                    'foto_user' => $data['foto_user'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);
                return redirect()->to('/pages');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
            }
        } else {
            $session->setFlashdata('msg', 'Username or Email does not exist.');
        }

        return redirect()->to('/sign');
    }

    public function signUp(): ResponseInterface
    {
        $dataPage = [
            'title' => "Urievent | Sign Up",
            // 'tes' => ['satu', 'dua', 'tiga']
        ];

        $view = view('sign/signUp', $dataPage);
        return $this->response->setBody($view);
    }

    public function save(): RedirectResponse
    {
        $new_username = $this->request->getVar('username');
        $data = $this->userModel->where('username_user', $new_username)->first();

        if (!$data) {
            $temp = $this->userModel->orderBy('id_user', 'desc')->first();
            $id_user_str = explode('u', $temp['id_user'])[1];
            $new_id_user = intval($id_user_str) + 1;
            $new_id_user_str = 'u' . str_pad($new_id_user, 3, '0', STR_PAD_LEFT);

            $this->userModel->save([
                'id_user' => $new_id_user_str,
                'nama_user' => $this->request->getVar('nama'),
                'email_user' => $this->request->getVar('email'),
                'password_user' => $this->request->getVar('password'),
                'username_user' => $new_username
            ]);
        } else {
            // gak aman
        }

        return redirect()->to('/sign');
    }

    public function resetPass(): ResponseInterface
    {
        $dataPage = [
            'title' => "Urievent | Forgot Password?"
        ];
        return view('sign/resetPass', $dataPage);
    }

    public function signOut(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function editProfile()
    {
        $userModel = new UserModel();
        $id_user = session('id_user');
        $dataUser = $userModel->find($id_user);
        $dataPage = [
            'title' => "Urievent | Edit Profile",
            'dataUser' => $dataUser
        ];
        return view('sign/editprofile', $dataPage);
    }

public function saveEdit()
    {
        $userModel = new UserModel();
        $id_user = session('id_user');
        $fileGambar = $this->request->getFile('layanan-img');

        $dataUser = [
            'id_user' => $id_user,
            'nama_user' =>  $this->request->getPost('user-name'),
            'username_user' => $this->request->getPost('user-username'),
            'email_user' => $this->request->getPost('user-email'),
            'foto_user' => $this->getImageLayanan($fileGambar),
            'telp_user' => $this->request->getPost('user-notelp'),
            'domisili_user' => $this->request->getPost('user-domisili'),
            'birthdate_user' => $this->request->getPost('user-birth'),
            'status' => 'verified'
        ];

        $newPassword = $this->request->getPost('user-newpass');
        if (!empty($newPassword)) {
            $dataUser['password_user'] = password_hash($newPassword, PASSWORD_DEFAULT);
        } else {
            $dataUser['password_user'] = session('password_user');
        }

        $userModel->update($id_user, $dataUser);

        session()->set([
            'nama_user' => $dataUser['nama_user'],
            'username_user' => $dataUser['username_user'],
            'email_user' => $dataUser['email_user'],
            'password_user' => $dataUser['password_user'],
            'telp_user' => $dataUser['telp_user'],
            'foto_user' => $dataUser['foto_user'],
            'domilisi_user' => $dataUser['domisili_user'],
            'birthdate_user' => $dataUser['birthdate_user'],
            'userstatus' => $dataUser['status']
        ]);

        return redirect()->to('/pages/uriservice');
    }

public function deleteAcc()
    {
        $userModel = new UserModel();
        $id_user = session('id_user');
        $userModel->delete($id_user);

        session()->destroy();
        return redirect()->to('/index');
    }
}