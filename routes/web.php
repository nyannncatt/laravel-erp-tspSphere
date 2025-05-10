<?php

use App\Http\Controllers\attendancecontroller;
use App\Http\Controllers\coursescontroller;
use App\Http\Controllers\gradescontroller;
use App\Http\Controllers\messagescontroller;
use App\Http\Controllers\parentsinfocontroller;
use App\Http\Controllers\studentinfocontroller;
use App\Http\Controllers\feedbackcontroller;
use App\Http\Controllers\announcementsController;

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

Route::get('/announcements', [announcementsController::class, 'index'])->name('announcements.index');
Route::get('/attendance', [attendancecontroller::class, 'index'])->name('attendance.index');
Route::get('/courses', [coursescontroller::class, 'index'])->name('courses.index');
Route::get('/grades', [gradescontroller::class, 'index'])->name('grades.index');
Route::get('/messages', [messagescontroller::class, 'index'])->name('messages.index');
Route::get('/parentsinfo', [parentsinfocontroller::class, 'index'])->name('parentsinfo.index');
Route::get('/studentinfo', [studentinfocontroller::class, 'index'])->name('studentinfo.index');
Route::get('/feedback', [feedbackcontroller::class, 'index'])->name('feedback.index');

//admin/crud -> announcements board
Route::resource('admin/announcements', announcementsController::class)->except(['create', 'edit', 'show']);

//admin/crud -> attendance
Route::resource('attendance', attendancecontroller::class);

//admin/crud -> courses
Route::resource('courses', coursescontroller::class)->except(['create', 'edit', 'show']);

//admin/crud -> grades
Route::resource('grades', gradescontroller::class);

//admin/crud -> messages
Route::resource('messages', messagescontroller::class);