<?php

namespace App\UseCases\Api;

use Illuminate\Support\Facades\Auth;

abstract class UseCase
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;

    public function __construct()
    {
//        $this->user = Auth::guard('api')->user();
    }
}
