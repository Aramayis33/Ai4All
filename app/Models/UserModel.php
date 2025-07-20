<?php

namespace App\Models;

use CodeIgniter\Model;
use SebastianBergmann\Type\TrueType;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name','last_name','email','password'];

    public function logIn($email,$password){
        $builder = $this->db->table($this->table);
        $builder->where('email',$email);
        $userInfo=$builder->get()->getRow();
        if($userInfo){
            if(password_verify($password,$userInfo->password)){
                return $userInfo;
            }
            return false;
        }
        return false;
    }

    public function checkEmail($email){
        $builder = $this->db->table($this->table);
        $builder->where('email',$email);
        if($builder->countAllResults()==0){
            return true;
        }
        return false;
    }

    public function signUp($data){
        $builder = $this->db->table($this->table);
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $builder->insert($data);
    }

}