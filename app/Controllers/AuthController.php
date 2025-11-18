<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;

class AuthController extends BaseController
{

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $model = new UserModel();
        $loginIdentifier = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $isEmail = filter_var($loginIdentifier, FILTER_VALIDATE_EMAIL);

        if ($isEmail) {
            $user = $model->where('email', $loginIdentifier)->first();
        } else {
            $user = $model->where('username', $loginIdentifier)->first();
        }

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $rules = [
            'name'             => 'required|min_length[3]|max_length[255]|is_unique[user.username]',
            'email'            => 'required|valid_email|is_unique[user.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($model->save($data)) {
            return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
}
