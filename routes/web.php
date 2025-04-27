<?php

use App\Http\Controllers\attendancecontroller;
use App\Http\Controllers\coursescontroller;
use App\Http\Controllers\gradescontroller;
use App\Http\Controllers\messagescontroller;
use App\Http\Controllers\parentsinfocontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/attendance', [attendancecontroller::class, 'index'])->name('attendance.index');
Route::get('/courses', [coursescontroller::class, 'index'])->name('courses.index');
Route::get('/grades', [gradescontroller::class, 'index'])->name('grades.index');
Route::get('/messages', [messagescontroller::class, 'index'])->name('messages.index');
Route::get('/parentsinfo', [parentsinfocontroller::class, 'index'])->name('parentsinfo.index');
Route::get('/studentinfo', [parentsinfocontroller::class, 'index'])->name('studentinfo.index');