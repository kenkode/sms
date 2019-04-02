<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VacationType;
use Redirect;

class VacationTypeController extends Controller
{
    //
    public function index()
    {
        $vacation_types = VacationType::all();
        return view('vacation_types.index',compact('vacation_types'));
    }

    public function create()
    {
        return view('vacation_types.create');
    }

    public function store(Request $request)
    {
        $vacation_type = new VacationType;
        $vacation_type->name = $request->name;
        $vacation_type->days = $request->days;
        $vacation_type->save();

        return Redirect::to('vacation_types');
    }

    public function edit($id)
    {
        $vacation_type = VacationType::find($id);
        return view('vacation_types.edit',compact('vacation_type'));
    }

    public function update(Request $request, $id)
    {
        $vacation_type = VacationType::find($id);
        $vacation_type->name = $request->name;
        $vacation_type->days = $request->days;
        $vacation_type->update();

        return Redirect::to('vacation_types');
    }

    public function destroy(Request $request, $id)
    {
        VacationType::find($id)->delete();

        return Redirect::to('vacation_types');
    }
}
