<?php


namespace App\Interfaces;


interface UserRepositoryInterface
{
    public function getUsers();
    public function getUser($user_id);
    public function resetWeeklyVisits();
    public function resetMonthlyVisits();

}
