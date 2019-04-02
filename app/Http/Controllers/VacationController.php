<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacation;
use App\VacationType;
use App\User;
use Redirect;

class VacationController extends Controller
{
    //
    public function index()
    {
        $vacations = Vacation::all();
        return view('vacations.index',compact('vacations'));
    }

    public function create()
    {
        $vacation_types = VacationType::all();
        $users = User::all();
        return view('vacations.create',compact('vacation_types','users'));
    }

    public function store(Request $request)
    {
        $vacation = new Vacation;
        $vacation->user_id = $request->user;
        $vacation->vacation_type_id = $request->vacation_type;
        $vacation->requested_days = $request->days;
        $vacation->status = 'Pending';
        $vacation->save();

        return Redirect::to('vacation_types');
    }
}
