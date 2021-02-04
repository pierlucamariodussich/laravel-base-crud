@extends('layout.main')

@section('content')

<form method="POST" action="{{ route('booking.store')}}">
          @csrf
          
          <div class="mb-3">
            <label for="name" 
             class="form-label">Nome Cliente </label>
            <input type="text" class="form-control" 
            id="name" name="guest_full_name" value="{{ old('guest_full_name')}}" aria-describedby="emailHelp">
            @error('guest_full_name') <p>{{$message}}</p> @enderror
          </div>
          <div class="mb-3">
            <label for="guest_credit_card" 
             class="form-label">Credit Card </label>
            <input type="number" class="form-control" 
            id="guest_credit_card" name="guest_credit_card" value="{{ old('guest_credit_card')}}" aria-describedby="emailHelp">
            @error('guest_credit_card') <p>{{$message}}</p> @enderror
          </div>
          <div class="mb-3">
            <label for="room" 
             class="form-label">Room </label>
            <input type="number" class="form-control" 
            id="room" name="room" value="{{ old('room')}}" aria-describedby="emailHelp">
            @error('room') <p>{{$message}}</p> @enderror
          </div>
          <div class="mb-3">
            <label for="from_date" 
             class="form-label"> FROM </label>
            <input type="date" class="form-control" 
            id="from_date"  name="from_date" value="{{ old('from_date')}}" aria-describedby="emailHelp">
            @error('from_date') <p>{{$message}}</p> @enderror
          </div>
          <div class="mb-3">
            <label for="to_date" 
             class="form-label"> TO</label>
            <input type="date" class="form-control" 
          id="to_date" name="to_date" value="{{ old('to_date')}}" aria-describedby="emailHelp">
          @error('to_date') <p> {{$message}} </p> @enderror
          </div>
          <div class="mb-3">
            <label for="more_details" 
             class="form-label"> Note</label>
            <textarea class="form-control" 
            id="more_details" name="more_details"  value="{{ old('more_details')}}" aria-describedby="emailHelp"> 
            </textarea>
            @error('more_details') <p>{{$message}}</p> @enderror
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
@endsection