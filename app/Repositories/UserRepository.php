<?php


namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\User;
use DB;

class UserRepository implements UserRepositoryInterface
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers()
    {
        return $this->user->orderBy('number_of_views', 'DESC')->paginate(15);
    }

    public function visitUser($user_id){
        $this->user->where('id', $user_id)->increment('number_of_views', 1);//->update(['number_of_views' => ++]);
    }

    public function getUser($user_id){
        return $this->user->where('id', $user_id)->first();
    }

}
