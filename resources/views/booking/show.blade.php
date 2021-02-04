@extends('layout.main')
@section('content')
    


<div class="card" style="width: 18rem;">

    
    <div class="card-body">
      <h5 class="card-title">{{ $booking-> guest_full_name}}</h5>
      <p class="card-text">{{ $booking-> more_details}}</p>
      <h6 class="card-title"> Room: {{ $booking-> room}} </h6>
      <h6 class="card-title"> From: {{ $booking-> from_date}} To: {{ $booking-> to_date}}</h6>


    </div>
    
  </div>
<p>Torna alla <a href="{{route('booking.index')}}">lista di prenotazione</a> </p>
    

  @endsection





