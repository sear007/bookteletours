@extends('layouts.app')
@section('title', 'TeleTour || Hotel Master\'s Rooms')
@section('content')
	@include('components.banner', [
		'title' => '', 
		'subTitle' => '', 
		'text' => 'Discover the finest accommodations in your desired Cambodian city. We offer a curated selection of options, ranging from charming guesthouses to luxurious 5-star hotels. Explore our budget-friendly choices and book your ideal stay today!', 
		'background' => ''
		])
	<div class="container">
		<div class="p-2"></div>
		{{-- @include('components.forms.filter') --}}
		@include('components.forms.filter_site')
	</div>
	<div class="ftco-section ftco-no-pb ftco-room content-rooms">
		<div class="container-fluid px-0">
			<div class="container">
				<div class="heading-section text-center ftco-animate">
					<h2 class="mb-4">Popular Hotels</h2>
				</div>
				<div class="row">
					@forelse($branch as $key => $hotel)
						<div class="col-md-3 mb-4">
							@include('pages.branch.layouts.card', ['post' => $hotel])
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
						{{ $branch->withQueryString()->onEachSide(5)->links() }}
					</div>
				</div>
			</div>
	
		</div>
	</div>
  	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
