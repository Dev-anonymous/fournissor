<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $role = auth()->user()->user_role;
            abort_if(!in_array($role, ['user']), 403);
            return $next($request);
        });
    }

    function service_request()
    {
        return view('user.service_request');
    }

    function profile()
    {
        return view('user.profile');
    }
}
