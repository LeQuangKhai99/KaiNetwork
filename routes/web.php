<?php

use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('users', function(Request $request) {
    return User::select('id', 'name', 'email')->paginate(request()->limit || 10);
});

Route::get('blogs', function() {
    return Blog::select('id', 'title', 'content')->paginate(request()->limit || 10);
});