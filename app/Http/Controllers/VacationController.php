<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacation;
use App\VacationType;
use App\User;
use Mail;
use App\Mail\VacationStatus;
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

        return Redirect::to('vacations');
    }

    public function edit($id)
    {
        $vacation = Vacation::find($id);
        $vacation_types = VacationType::all();
        $users = User::all();
        return view('vacations.edit',compact('vacation_types','users','vacation'));
    }

    public function update(Request $request, $id)
    {
        $vacation = Vacation::find($id);
        $vacation->user_id = $request->user;
        $vacation->vacation_type_id = $request->vacation_type;
        $vacation->requested_days = $request->days;
        $vacation->status = 'Pending';
        $vacation->update();

        return Redirect::to('vacations');
    }

    public function approve(Request $request, $id)
    {
        $vacation = Vacation::find($id);
        $vacation->status = 'Approved';
        $vacation->reason = '';
        $vacation->update();

        Mail::to($vacation->user->email)->send(new VacationStatus($vacation));

        return Redirect::to('vacations');
    }

    public function rejectVacation($id)
    {
        $vacation = Vacation::find($id);
        return view('vacations.reject',compact('vacation'));
    }

    public function reject(Request $request, $id)
    {
        $vacation = Vacation::find($id);
        $vacation->status = 'Rejected';
        $vacation->reason = $request->reason;
        $vacation->update();

        Mail::to($vacation->user->email)->send(new VacationStatus($vacation));

        return Redirect::to('vacations');
    }
}
