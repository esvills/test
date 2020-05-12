<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class LoginController extends Controller
{
    protected $service;

    /**
     * LoginController constructor.
     *
     * @param \App\Services\LoginService $service
     */
    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }

    /**
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        return $this->service->login($request);
    }
}
