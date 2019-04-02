@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{{ URL::to('profile/update/'.$user->id) }}}">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" required class="form-control" id="exampleInputEmail1" name="name" value="{{$user->name}}" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" required="" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="phone" value="{{$user->phone}}" placeholder="Enter phone">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">ID Number</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" name="id_number" value="{{$user->id_number}}" placeholder="Enter ID Number">
                </div>
                <div class="form-group">
                    <label>Date of Birth:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="dob" value="{{$user->dob}}" id="datepicker">
                    </div>
                    <!-- /.input group -->
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kra Pin</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="kra_pin" value="{{$user->kra_pin}}" placeholder="Enter Kra Pin">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nssf Number</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nssf_number" value="{{$user->nssf_number}}" placeholder="Enter Nssf Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nhif Number</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nhif_number" value="{{$user->nhif_number}}" placeholder="Enter Nhif Number">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        <!-- ./col -->
      </div>
@endsection
