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

Route::get('/', function(){
	return view('login');
});

Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/logout', 'UserController@getLogout');


Route::get('/error', function(){
	return view('error');
});

Route::group(['prefix'=>'user', 'middleware'=>'login'], function(){
	Route::get('create', 'TicketsController@getTickets');
	Route::post('create', 'TicketsController@postTickets');

	Route::group(['prefix' => 'myticket'], function() {
		Route::get('all', 'TicketsController@getAllMyTicket');
		Route::get('new', 'TicketsController@getNewMyTicket');
		Route::get('inprogress', 'TicketsController@getInprogressMyTicket');
		Route::get('resolved', 'TicketsController@getResolvedMyTicket');
		Route::get('outofdate', 'TicketsController@getOutOfDateMyTicket');
	});
	
	Route::group(['prefix' => 'reticket'], function() {
		Route::get('all', 'TicketRelatersController@getAllReTicket');
		Route::get('new', 'TicketRelatersController@getNewReTicket');
		Route::get('inprogress', 'TicketRelatersController@getInprogressReTicket');
		Route::get('resolvedso', 'TicketRelatersController@getResolvedReTicket');
		Route::get('outofdate', 'TicketRelatersController@getOutOfDateReTicket');
	});

	Route::group(['prefix' => 'assignticket'], function() {
		Route::get('all', 'TicketAssignController@getAllTicket');
		Route::get('new', 'TicketAssignController@getNewTicket');
		Route::get('feedback', 'TicketAssignController@getFeedBackTicket');
		Route::get('inprogress', 'TicketAssignController@getInprogressTicket');
		Route::get('outofdate', 'TicketAssignController@getOutOfDateTicket');
	});

	Route::group(['prefix' => 'teamticket', 'middleware'=>'viewteam'], function() {
		Route::get('all', 'TeamTicketController@getAllTicket');
		Route::get('new', 'TeamTicketController@getNewTicket');
		Route::get('inprogress', 'TeamTicketController@getInprogressTicket');
		Route::get('feedback', 'TeamTicketController@getFeedBackTicket');
		Route::get('outofdate', 'TeamTicketController@getOutOfDateTicket');
		Route::get('close', 'TeamTicketController@getCloseTicket');
	});

	Route::group(['prefix' => 'itticket', 'middleware'=>'viewit'], function() {
		Route::get('all', 'ItTicketController@getAllTicket');
		Route::get('new', 'ItTicketController@getNewTicket');
		Route::get('inprogress', 'ItTicketController@getInprogressTicket');
		Route::get('feedback', 'ItTicketController@getFeedBackTicket');
		Route::get('outofdate', 'ItTicketController@getOutOfDateTicket');
		Route::get('close', 'ItTicketController@getCloseTicket');
	});

	Route::group(['prefix' => 'edit', 'middleware'=>'edit'], function() {
		Route::group(['prefix' => '{idticket}'], function() {
			Route::get('/', 'EditTicketController@getEdit');
			Route::post('/comment', 'EditTicketController@postComment');
		    Route::post('/teamid', 'EditTicketController@postEditTeamId');
		    Route::post('/priority', 'EditTicketController@postEditPriority');
		    Route::post('/deadline', 'EditTicketController@postEditDeadline');
		    Route::post('/relaters', 'EditTicketController@postEditRelaters');
		    Route::post('/assign', 'EditTicketController@postEditAssign');
		    Route::post('/status', 'EditTicketController@postEditStatus');
		});
	});
	
	Route::post('AjaxMarkRead/{idticket}', 'AjaxMarkReadController@postRead');
	

});


