<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Users;

class UserController extends Controller
{
    protected $user = null;

    /**
     * UserController constructor.
     * @param Users $user
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    /**
     * @return Users[]|\Illuminate\Database\Eloquent\Collection
     */
    public function allUsers(){
        return $this->user->allUsers();
    }

    /**
     * @param $id
     */
    public function  getUser($id){
        $user = $this->user->getUser($id);
        if(!$user){
            return response()->json('usuário não encontrado!', 400);
        }
        return response()->json($user, 200);
    }

    /**
     * @return Users
     */
    public function saveUser(){
        return $this->user->saveUser();
    }
}
