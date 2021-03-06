<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){//Get users
        $users = $this->userRepository->getUsers();//dd($users);
        if($users)
            return $this->apiResponse(UserResource::collection($users));//apiResponse initialized in Controller.php to be public for all controllers
        return $this->notFoundResponse("No Users found");
    }

    public function user($user_id){
        $this->userRepository->visitUser($user_id);
        $user = $this->userRepository->getUser($user_id);//dd($user->monthly_visits_count);
        if($user){
            return [$user];//instead of using $this->apiResponse() to make the resource compatible with the tests;
        }
        else{
            return $this->notFoundResponse("User is Not Found");
        }
    }
}
