<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('', 'HomeController');
Route::resource('question', 'QuestionController');
Route::get('question/{id}/createFromCategory', 'QuestionController@createFromCategory')->name('createFromCategory');
Route::resource('answer', 'AnswerController');
Route::resource('questionKind', 'QuestionKindController');
Route::get('admin', 'AdministrationController@index')->middleware('role:admin')->name('admin');
Route::get('admin.kindCreate', 'AdministrationController@questionKindCreate')->middleware('role:admin')->name('admin.questionKindCreate');
Route::post('admin.kindStore', 'AdministrationController@questionKindStore')->middleware('role:admin')->name('admin.questionKindStore');
Route::delete('admin.kindDestroy', 'AdministrationController@questionKindDestroy')->middleware('role:admin')->name('admin.questionKindDestroy');
Auth::routes(['verify' => true]);
