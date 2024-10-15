@extends('layouts.app')
@section('title', 'TeleTour || Hotel Master\'s Rooms')
@section('content')
  @include('components.banner', [
	'title' => '', 
	'subTitle' => '', 
	'text' => 'At Tele Tours, we specialize in providing exceptional and unique experiences. We streamline your planning process by handpicking only the best value and distinctive offerings for our platform. Explore the options that resonate with you and book your extraordinary adventure today!', 
	'background' => ''])
  <div class="container">
      <div class="p-2"></div>
      @include('components.forms.filter_site')
  </div>
  <div class="ftco-section ftco-no-pb ftco-room content-rooms">
		<div class="container-fluid px-0">
			<div class="container">
				<div class="heading-section text-center ftco-animate">
					<h2 class="mb-4">Popular tours and unique experiences</h2>
				</div>
				<div class="row">
					@forelse($tours as $key => $tour)
						<div class="col-md-3 mb-4">
							@include('pages.tours.components.card', ['post' => $tour])
						</div>
					@empty
						<div class="col-m-12">
							<div class="alert alert-primary w-" role="alert">
								<strong>We're sorry,</strong> Record not found.
							  </div>
						</div>
					@endforelse
				</div>
			</div>
	
			<div class="row justify-content-center my-5">
				<div class="col-md-6">
					<div class="d-flex justify-content-center">
						{{ $tours->withQueryString()->onEachSide(5)->links() }}
					</div>
				</div>
			</div>
	
		</div>
	</div>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
