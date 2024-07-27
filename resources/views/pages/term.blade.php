@extends('layouts.app')
@section('title', 'TeleTour | Terms & Conditions')
@section('content')
@include('components.banner', ['title' => 'Tele Tours', 'subTitle' => 'Terms & Conditions', 'background' => ''])
<div class="container bg-white position-relative shadow rounded" style='top: -50px'>
    <div class="p-4">
        <p>You must be aged 18 years or over to make a travel booking with us.</p>
        <h5>Confirmation: </h5>
        <p>Upon receipt of your request, we will check and inform you about availability. Your booking is considered confirmed when we receive your acknowledgment.</p>
        <h5>Deposits </h5>
        <p>All trips require a non-refundable deposit: 50% of the total amount unless otherwise stated. The deposit will confirm your booking. The balance will be paid after you receive the travel documents and final itinerary from us or no later than 15 days prior to the departure date unless otherwise stated.</p>
        <h5>Cancellations by customers </h5>
        <p>As a general rule, unless otherwise stated, our policy is that all cancellations must be informed in writing either by email or fax.</p>
        <h5>Cancellations will be charged as follows:</h5>
        <ul>
            <li>More than 30 days prior to trip departure: No charge, however, the deposit is non-refundable.</li>
            <li>16-29 days prior to departure date: 30% charge on top of the total amount</li>
            <li>8-15 days prior to departure date: 50% charge on top of the total amount</li>
            <li>Less than 7 days prior to departure date: 100% charge</li>
            <li>No-Show: 100% of total charge.</li>
        </ul>

        <p>No refunds or exchanges can be made in respect of accommodation, meals, sightseeing tours, transport, or any other services which are included in the tour prices but not utilized by the tour member.</p>
        <h5>Liability and Insurance</h5>
        <p>TELE TOURS is not responsible for any loss, injury, or damage sustained by passengers. Additional expenses incurred due to delays, accidents, natural disasters, political actions, and unrest must be borne by the passengers. Passengers are required to have full travel insurance. Airline schedules and local conditions may affect accommodation and itineraries. Should this occur, TELE TOURS will endeavor to substitute a suitable arrangement of similar value. We highly recommend travelers purchase personal travel insurance which includes trip cancellation, medical, and other coverage.</p>
        <h5>Complaints/Refunds</h5>
        <p>TELE TOURS will act as an intermediary between the clients and other services suppliers such as air, train, boat, hotel, car, etc in the event of any complaint. Participation in any tour implies full agreement to the above conditions by all parties involved.</p>
    </div>
</div>
@endsection