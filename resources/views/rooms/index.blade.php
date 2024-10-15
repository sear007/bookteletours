@extends('navbar.header')
@section('title', 'Our Rooms')
<style>
  .search{
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
	            <h1 class="mb-4 bread">Rooms</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container"style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
    		<div class="row no-gutters">
    			<div class="col-lg-12">
    				<form action="#" class="booking-form aside-stretch">
	        		<div class="row">
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Check-in Date</label>
									<input type="text" class="form-control checkin_date" placeholder="Check-in date">
								</div>
							</div>
	        			</div>
	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
									<label for="#">Check-out Date</label>
									<input type="text" class="form-control checkout_date" placeholder="Check-out date">
								</div>
							</div>
	        			</div>

	        			<div class="col-md d-flex py-md-4">
	        				<div class="form-group align-self-stretch d-flex align-items-end">
	        					<div class="wrap align-self-stretch py-3 px-4">
			      					<label for="#">Guests</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="" id="" class="form-control">
													<option value="">1 Adult</option>
													<option value="">2 Adult</option>
													<option value="">3 Adult</option>
													<option value="">4 Adult</option>
													<option value="">5 Adult</option>
													<option value="">6 Adult</option>
												</select>
										</div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group d-flex align-self-stretch">
			              <a href="#" class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check Availability <small>Best Price Guaranteed!</small></span></a>
			            </div>
	        			</div>
	        		</div>
	        	</form>
	    		</div>
    		</div>
    	</div>
    </div>
    <div class="ftco-section ftco-no-pb ftco-room">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Tele Tour Rooms</span>
            <h2 class="mb-4">Hotel Master's Rooms</h2>
          </div>
        </div> 
          <div class="row no-gutters">
              @foreach($branch as $branchs)
              <div class="col-lg-6 ">
                <div class="room-wrap d-md-flex ftco-animate">
                  <a href="#" class="img"><img src="images/branch_photo/<?php echo $branchs->photo ?>" alt="" height="100%" width="100%"></a>
                  <div class="half left-arrow d-flex align-items-center">
                    <div class="text p-4 text-center">
                      <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                      <p class="mb-0"><span class="price mr-1"><?php echo $branchs->price ?></span> <span class="per">per night</span></p>
                      <h3 class="mb-3"><a href="rooms.html"><?php echo $branchs->name ?></a></h3>
                      <p class="pt-1"><a href="{{ url('/room_detail'). $branchs->id }}" class="btn-custom px-3 py-2 rounded">View Details <span class="icon-long-arrow-right"></span></a></p>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach

          </div>
      </div>
    </div>
@endsection