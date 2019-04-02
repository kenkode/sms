
@extends('layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vacations
        <small>Reject</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><i class="fa fa-file"></i> Vacations</li>
        <li class="active">Reject</li>
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
              <h3 class="box-title">Create </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('/vacations/reject/'.$vacation->id) }}">
              {{ csrf_field() }}
              <div class="box-body">
                <p style="color: red">Please fill in the fields in *</p>
                <div class="form-group">
                  <label for="exampleInputEmail1">Reason</label>
                  <textarea name="reason" class="form-control" value="{{old('reason')}}"></textarea>
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
