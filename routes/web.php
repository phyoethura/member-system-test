<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('members.index');
});

Route::resource('members', MemberController::class);
Route::get('reports', [MemberController::class, 'reports'])->name('members.reports');