@extends('layouts.main')
@section('content')

<div class="row">
	<div class="col-lg-12">
  <h3>Vacations</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-12">

    @if (Session::has('flash_message'))

      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      {{ Session::get('flash_message') }}
     </div>
    @endif

     @if (Session::has('delete_message'))

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      {{ Session::get('delete_message') }}
     </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">
          <a class="btn btn-info btn-sm" href="{{ URL::to('vacation_types/create')}}">new vacation</a>
        </div>
        <div class="panel-body">


    <table id="users" class="table table-condensed table-bordered table-responsive table-hover">


      <thead>

        <th>#</th>
        <th> Staff</th>
        <th> Vacation Type</th>
        <th> Requested Days</th>
        <th> Status</th>
        <th> Reason</th>
        <th>Action</th>

      </thead>
      <tbody>

        <?php $i = 1; ?>
        @foreach($vacations as $vacation)

        <tr>

          <td> {{ $i }}</td>
          <td>{{ $vacation->user->name }}</td>
          <td>{{ $vacation->vacationType->name }}</td>
          <td>{{ $vacation->days }}</td>
          <td>{{ $vacation->status }}</td>
          <td>{{ $vacation->reason }}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{URL::to('vacations/edit/'.$vacation->id)}}">Update</a></li>
                   
                    <li><a href="{{URL::to('vacations/delete/'.$vacation->id)}}" onclick="return (confirm('Are you sure you want to delete this vacation?'))">Delete</a></li>
                    
                  </ul>
              </div>

                    </td>



        </tr>

        <?php $i++; ?>
        @endforeach


      </tbody>


    </table>
  </div>


  </div>

</div>

@stop