<?php

declare(strict_types=1);

use App\Http\Controllers\Tenancy\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::get('/', function () {

        // $user = null;

        // tenancy()->central(function () use (&$user) {
        //     $user = User::first();
        // });

        // if ($user) {
        //     dd($user->email);
        // } else {
        //     dd('No user found');
        // }

        return view('tenancy.welcome');
    });

    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', function () {
            return view('tenancy.dashboard');
        })->name('dashboard');

        Route::resource('tasks', TaskController::class);

        Route::get('file/{path}', function ($path) {
            return response()->file(Storage::path($path));
        })
            ->where('path', '.*') // Recognize special characters in the path => "file/task/image.png"
            ->name('file');
    });

    require __DIR__ . '/auth.php';
});
