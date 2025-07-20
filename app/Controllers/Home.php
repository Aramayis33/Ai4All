<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');

    }

    public function logIn()
    {
        $email = $this->request->getJsonVar('email');
        $password = $this->request->getJsonVar('password');
        $userModel = new UserModel();
        $user = $userModel->logIn($email, $password);
        if ($user) {
            session()->set('user', $user);
            return $this->response->setStatusCode(200)->setJSON([
                'success' => true,
                'user' => $user
            ]);
        } else {
            return $this->response->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'Մուտքանունը կամ գաղտնաբառը սխալ է'
            ]);
        }
    }

    public function signUp(){
        $email = $this->request->getJsonVar('email');
        $password = $this->request->getJsonVar('password');
        $firstName = $this->request->getJsonVar('name');
        $lastName = $this->request->getJsonVar('lastName');
        $userModel = new UserModel();
        if($userModel->checkEmail($email)){
            $data['first_name'] = $firstName;
            $data['last_name'] = $lastName;
            $data['email'] = $email;
            $data['password'] = $password;
            $userModel->signUp($data);
            return $this->response->setStatusCode(200)->setJSON([
                'success' => true
            ]);
        }
        else{
            return $this->response->setStatusCode(401)->setJSON([
                'success' => false,
                'message' => 'Այս էլ․ փոստով օգտատեր արդեն գոյություն ունի։'
            ]);        }
    }

    public function logout()
    {
        session()->destroy();
        return $this->response->setJSON(['success' => true]);
    }

    public function assistant(){
        return view('assistant');
    }

}
