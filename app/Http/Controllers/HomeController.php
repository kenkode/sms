<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Vacation;
use Illuminate\Support\Facades\Auth;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = User::count();
        $vacations = Vacation::count();
        $approved_vacations = Vacation::where('status','Approved')->count();
        $rejected_vacations = Vacation::where('status','Rejected')->count();
        return view('home',compact('staff','vacations','approved_vacations','rejected_vacations'));
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('profile',compact('user'));
    }
    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->kra_pin = $request->kra_pin;
        $user->nssf_number = $request->nssf_number;
        $user->nhif_number = $request->nhif_number;
        $user->id_number = $request->id_number;
        $user->dob = $request->dob;
        $user->update();

        return Redirect::to('profile');
    }
}
