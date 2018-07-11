<?php

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
    return view('chat');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/start', 'StartController@index');
Route::get('/start/json', 'StartController@getJson');
Route::get('/start/chart', 'StartController@chartData');
Route::get('/start/chart-rnd', 'StartController@chartRandom');

Route::get('/start/socket-chart', 'StartController@newEvent');
Route::get('/start/send-msg', 'StartController@sendMessage');
Route::get('/start/send-private-msg', 'StartController@sendPrivateMessage');

Route::post('/messages', function(\Illuminate\Http\Request $request) {
//    event(new \App\Events\Message($request->input('body')));
    event(new \App\Events\PrivateChat($request->all()));
});

Route::get('/room/{room}', function(App\Room $room) {
    return view('room', ['room' => $room]);
});
