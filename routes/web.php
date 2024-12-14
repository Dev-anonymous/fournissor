<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use App\Models\Baniere;
use App\Models\Business;
use App\Models\Category;
use App\Models\Pay;
use App\Models\Service;
use App\Models\User;
use App\Models\Zonesante;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $business = Business::orderBy('businessname')->get();
    $service = Service::orderBy('service')->get();
    return view('index', compact('business', 'service'));
})->name('home');

Route::get('/login', function () {
    if (Auth::check()) {
        $role = auth()->user()->user_role;
        $url = '';
        if ($role == 'admin') {
            $url = route('admin.home');
        } elseif ($role == 'provider') {
            $url = route('business.service');
        } elseif ($role == 'user') {
            $url = route('user.service-request');
        } else {
            Auth::logout();
            abort(403, "Invalide user role : $role");
        }
        $r = request('r');
        if ($r) {
            $url = urldecode($r);
        }
        return redirect($url);
    }

    return view('login');
})->name('login');

Route::post('auth/login', [AppController::class, 'login'])->name('auth-login');
Route::post('auth/logout', [AppController::class, 'logout'])->name('auth-logout');
Route::post('auth/new', [AppController::class, 'newu'])->name('auth-new');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('',  'home')->name('admin.home');
            Route::get('app-config',  'appconfig')->name('admin.appconfig');
            Route::get('profile',  'profile')->name('admin.profile');
            Route::get('provider',  'provider')->name('admin.provider');
            Route::get('user',  'user')->name('admin.user');
            Route::get('app-contact',  'contact')->name('admin.contact');
            Route::get('admins',  'admins')->name('admin.admins');
            Route::get('category',  'category')->name('admin.category');
            Route::get('service',  'service')->name('admin.service');
            Route::get('service-request',  'service_request')->name('admin.service-request');
        });
    });

    Route::prefix('provider')->group(function () {
        Route::controller(BusinessController::class)->group(function () {
            // Route::get('',  'home')->name('business.home');
            Route::get('service',  'service')->name('business.service');
            Route::get('service-request',  'service_request')->name('business.service-request');
            Route::get('profile',  'profile')->name('business.profile');
        });
    });
    Route::prefix('user')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('service-request',  'service_request')->name('user.service-request');
            Route::get('profile',  'profile')->name('user.profile');
        });
    });
});
