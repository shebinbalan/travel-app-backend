@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Dashboard Content -->
<div class="container-fluid">
  <div class="row">
    <!-- Info Box 1 -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>120</h3>
          <p>Total Bookings</p>
        </div>
        <div class="icon">
          <i class="fas fa-suitcase-rolling"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Info Box 2 -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>45</h3>
          <p>Active Packages</p>
        </div>
        <div class="icon">
          <i class="fas fa-map-marked-alt"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Info Box 3 -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>12</h3>
          <p>Upcoming Tours</p>
        </div>
        <div class="icon">
          <i class="fas fa-plane-departure"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Info Box 4 -->
    <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>8</h3>
          <p>New Messages</p>
        </div>
        <div class="icon">
          <i class="fas fa-envelope"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>
@endsection