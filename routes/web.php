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

Route::get('/', 'ContentsController@home');
Route::get('/clients', 'ClientController@index');
Route::get('/clients/new', 'ClientController@newClient');
Route::post('/clients/new', 'ClientController@create');
Route::get('/clients/{client_id}', 'ClientController@show');
Route::post('/clients/{client_id}', 'ClientController@modify');

Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');
Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');

Route::get('/about', function () {
  $response_arr = [];
  $response_arr['author'] = 'BP';
  $response_arr['version'] = '0.1.1';
  return $response_arr;
  // return '<h3>About</h3>';
});

Route::get('/home', function () {
  $data = [];
  $data['version'] = '0.1.1';
  return view('welcome', $data);
});

Route::get('/di', 'ClientController@di');

Route::get('/facades/db', function () {

  return DB::select('SELECT * FROM table');
});

Route::get('/facades/encrypt', function () {

  return Crypt::encrypt('123456789');
});

//eyJpdiI6IktObWI3dlwvWm9NY0hGS0tJOWRJVDFRPT0iLCJ2YWx1ZSI6IkVvZURQd1wvaVJlXC9oZGNnU3ZQUzNGQ2RxWlJjM3V5azBNTU1NZkYxQk90Yz0iLCJtYWMiOiI5ZGE2NjVhYTNmNWJjOTM2YTk3Mzg5ZjZhNmZlZjdiNmRmZjFlYmJlY2UzYTNiMzE5Y2RhZWJmYWJiZGIwNzgzIn0

Route::get('/facades/decrypt', function () {

  return Crypt::decrypt('eyJpdiI6IktObWI3dlwvWm9NY0hGS0tJOWRJVDFRPT0iLCJ2YWx1ZSI6IkVvZURQd1wvaVJlXC9oZGNnU3ZQUzNGQ2RxWlJjM3V5azBNTU1NZkYxQk90Yz0iLCJtYWMiOiI5ZGE2NjVhYTNmNWJjOTM2YTk3Mzg5ZjZhNmZlZjdiNmRmZjFlYmJlY2UzYTNiMzE5Y2RhZWJmYWJiZGIwNzgzIn0');
});
