<?php

Route::get('/calender', 
  'Pratik\ToDoEventCalender\Controller\CalenderController@index');

Route::post('/calender/getfrm', 'Pratik\ToDoEventCalender\Controller\CalenderController@create');
Route::post('/calender/save', 'Pratik\ToDoEventCalender\Controller\CalenderController@store');
Route::get('/calender/getcalender', 'Pratik\ToDoEventCalender\Controller\CalenderController@getCalender');
