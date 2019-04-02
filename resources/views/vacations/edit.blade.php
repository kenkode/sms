
@extends('layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vacations
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><i class="fa fa-file"></i> Vacations</li>
        <li class="active">Edit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <!-- small box -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/vacations/update/'.$vacation->id) }}">
              {{ csrf_field() }}
              <div class="box-body">
                <p style="color: red">Please fill in the fields in *</p>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <select class="form-control" name = "user">
                    @foreach($users as $user)
                      <option value="{{$user->id}}"<?= ($vacation->user_id==$user->id)?'selected="selected"':''; ?>>{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  <select class="form-control" name="vacation_type">
                    @foreach($vacation_types as $vacation_type)
                      <option value="{{$vacation_type->id}}"<?= ($vacation->vacation_type_id==$vacation_type->id)?'selected="selected"':''; ?>>{{$vacation_type->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Requested Days</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter days" style="width: 30%" value="{{$vacation->requested_days}}" name="days" required="">
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          <!-- /.box -->
        </div>
        
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
  @stop
