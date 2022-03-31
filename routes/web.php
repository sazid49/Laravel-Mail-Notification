<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-notification',function()
{  
   $users =User::all();
//    $user->notify(new EmailNotification());
// Notification::send($user, new EmailNotification());

foreach ($users as  $user) {
    Notification::send($user, new EmailNotification());
}
return redirect()->back();
   
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
