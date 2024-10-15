@extends('layouts.app')
@section('title', 'TeleTour | About')
@section('content')
    @include('components.banner', [
        'title' => 'Tele Tours',
        'subTitle' => 'Live and Book with Us!',
        'background' => '',
    ])
    <div class="container bg-white position-relative shadow rounded" style='top: -50px'>
       <div class="py-5">
		@include('components.what-is-tele-tour')
	   </div>
       <div class="container">
        <h1 class="text-center">About Us</h1>
        <p>Tele Tours is Cambodia’s travel and lifestyle online booking platform, we provide you with access to discover and purchase different types of travel needs, local services, and financial services products. Tele Tours' comprehensive product portfolio includes transport booking services such as flight tickets, bus, trains, car rental, and airport transfers, as well as access to the largest accommodation inventory in Cambodia. Not only that, to help you fulfill more of your lifestyle aspirations, we also complete our offerings with a wide range of local attractions, activities as well as wellness and spas. So, whatever your lifestyle choice is, you are just one click away!</p>
        <p>Tele Tours believes that happiness may come in many forms for different people on different occasions. Therefore, the merging of tourism and technology experts with our credibility of more than 10 years of experience, we promise you an extensive choice to ignite your very own state of happiness. Whether you are looking for a glamping experience or staycation in a 5-star resort, a relaxing spa day or a thrilling holiday adventure, a convenient first-class flight, or an exciting road trip, both for domestic and international trips, you got it all in one Tele Tours Online Booking Platform.</p>
        <p>With 24/7 customer service in local language and English as well as more than 10 different local payment methods, Tele Tours has been downloaded more than 1 million times, making it the most popular travel and lifestyle online booking platform in Cambodia.</p>
        <p>What are you waiting for? Book that well-planned trip or have your first last-minute getaway with us. For all of your unique travel and lifestyle choices, as always, Tele Tours got you covered.</p>
        <div class="pb-5"></div>
      </div>
	</div>
@endsection