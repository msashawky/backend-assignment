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
        return $this->user->orderBy('weekly_visits_count', 'DESC')->paginate(15);
    }

    public function visitUser($user_id){
        $user = $this->user->find($user_id);
        $user->weekly_visits_count++;
        $user->monthly_visits_count++;
        $user->save();
        //$this->user->where('id', $user_id)->increment('weekly_visits_count')->increment('monthly_visits_count');//->increment('monthly_visits_count', 1);
    }

    public function getUser($user_id){
        //cache()->remember()
        return $this->user->where('id', $user_id)->first();
    }

    public function resetWeeklyVisits(){// this method will be used as a facade in the reset job
        $this->user->where('id', '!=', 0)->update(['weekly_visits_count' => 0]);
    }
    public function resetMonthlyVisits(){// this method will be used as a facade in the reset job
        $this->user->where('id', '!=', 0)->update(['monthly_visits_count' => 0]);
    }

}
