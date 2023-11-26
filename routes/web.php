<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::get('dyski/{drive?}' , function(string $drive)
{
    $dyski = match($drive)
    {
        'fdd' => 'dyskietka',
        'hdd' => 'dysk HDD',
        'ssd' => 'dysk SSD',
        default => 'Błędne dane podane przez użytkownika'
    };
    return $dyski;
});

Route::get('miasto', function(){
    return view('city',['firstName' => 'Jano', 'lastName' => 'Pedał', 'city' => 'Poznań Poznan hej kolejorz' ]);
});

Route::get('miasto_aa/{age?}', function($age){
    return view('city',['firstName' => 'Jano', 'lastName' => 'Pedał', 'city' => 'Poznań Poznan hej kolejorz', 'age' => $age ]);
});

Route::redirect('city','miasto');

Route::get('stronka/{x?}',function(string $x)
{
    $info = [
        'about' => 'O nas',
        'contact' => 'bartek@furry.com',
        'home' => 'Strona główna'
    ];

    return $info[$x];
});