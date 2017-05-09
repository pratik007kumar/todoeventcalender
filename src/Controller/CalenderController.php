<?php
namespace Pratik\ToDoEventCalender\Controller;

use App\Http\Controllers\Controller;
 
class CalenderController extends Controller
{
 
    public function index()
    {
         return view('todocalender::calender')->with('cal','dfasdfasfsafsadf');
    }
 
}