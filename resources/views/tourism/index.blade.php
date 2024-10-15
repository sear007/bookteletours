@extends('navbar.header')
@section('title', 'Tourism Site')
<style>
  .search {
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    text-align: center;
    margin-top: 20px;
  }
</style>


@section('content')
<div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span></p>
          <h1 class="mb-4 bread">Tourism</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="ftco-section ftco-no-pb ftco-room">
  <div class="container-fluid px-0">
    <div class="row no-gutters justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Tele Tour Site</span>
        <h2 class="mb-4"></h2>
      </div>
    </div>
    <div class="row no-gutters">
      @foreach($tourism as $tourisms)
      <div class="col-lg-6 ">
        <div class="room-wrap d-md-flex ftco-animate">
          <a href="#" class="img"><img src="images/branch_photo/<?php echo $tourisms->photo ?>" alt="" height="100%" width="100%"></a>
          <div class="half left-arrow d-flex align-items-center">
            <div class="text p-4 text-center">
              <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
              <h3 class="mb-3"><a href="rooms.html"><?php echo $tourisms->name ?></a></h3>
              <p class="pt-1"><a href="{{ url('/room_detail'). $tourisms->id }}" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div> -->
@endsection