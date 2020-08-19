<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Traits\ApiResponseTrait;

class Controller extends BaseController
{
    use ApiResponseTrait, AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
