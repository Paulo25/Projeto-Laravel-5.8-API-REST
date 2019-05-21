<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Users extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
      'first_name', 'last_name', 'email', 'city', 'state'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return Users[]|\Illuminate\Database\Eloquent\Collection
     */
    public function allUsers(){
        return self::all();
    }

    /**
     * Saved one objeto type on user
     * @return Users
     */
    public function saveUser(){
        $input = Input::all();
        $input['password'] = Hash::make('password');
        $user = new Users();
        $user->fill($input); //massing associat
        $user->save();
        return $user;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUser($id){
        $user = self::find($id);
        if(is_null($user)){
            return false;
        }
        return $user;
    }
}
