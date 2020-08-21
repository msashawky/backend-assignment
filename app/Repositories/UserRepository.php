<?php


namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Cache;
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
        return Cache::rememberForever('usersCache', function(){
             $users = $this->user->orderBy('weekly_visits_count', 'DESC')
                 ->paginate(15)
                 ->each(function ($row) {
                     $row->weekly_visits_count++;
                     $row->monthly_visits_count++;
                     $row->save();
                 });
             return $users;
        });



    }

    public function visitUser($user_id){
        $user = $this->user->find($user_id);
        $user->weekly_visits_count++;
        $user->monthly_visits_count++;
        $user->save();
        return $user;
    }

    public function getUser($user_id){
        return $this->user->find($user_id);
    }

    public function resetWeeklyVisits(){// this method will be used as a facade in the weekly reset console
        $this->user->where('id', '!=', 0)->update(['weekly_visits_count' => 0]);
    }
    public function resetMonthlyVisits(){// this method will be used as a facade in monthly reset console
        $this->user->where('id', '!=', 0)->update(['monthly_visits_count' => 0]);
    }

}
