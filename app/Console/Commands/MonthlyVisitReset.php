<?php

namespace App\Console\Commands;
use App\Repositories\UserRepository;

use Illuminate\Console\Command;

class MonthlyVisitReset extends Command
{
    protected $userRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset monthly visits for all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->userRepository->resetWeeklyVisits();
    }
}
