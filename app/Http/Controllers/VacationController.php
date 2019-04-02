<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacation;

class VacationController extends Controller
{
    //
    public function index()
    {
        $vacations = Vacation::all();
        return view('vacations.index',compact('vacations'));
    }
}
