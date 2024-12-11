<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (has_permission('admin.dashboard')) {
        return redirect()->route("admin.dashboard");
    }

    return redirect()->route('profile.index');
})->name('home')->middleware('auth');

require __DIR__ . '/groups/admin.php';
require __DIR__ . '/groups/auth.php';
require __DIR__ . '/groups/user.php';
require __DIR__ . '/groups/verification.php';

Route::get('test', function () {
    $data = User::where('first_name','like','%'. request()->get('search'). '%')
         ->pluck('first_name','id')->toArray();
    return response()->json($data);

 });
