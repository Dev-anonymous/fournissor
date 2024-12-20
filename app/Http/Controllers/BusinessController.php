<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $role = auth()->user()->user_role;
            abort_if(!in_array($role, ['provider']), 403);
            return $next($request);
        });
    }

    function service()
    {
        return view('business.service');
    }
    function service_request()
    {
        return view('business.service_request');
    }

    function profile()
    {
        return view('business.profile');
    }
}
