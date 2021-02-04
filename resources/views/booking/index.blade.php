@extends('layout.main')

    @section('content')
        
    
    <table class="table">
        <thead>
          <tr>
            @foreach( $columns as $column )
                 <th scope="col"> {{ $column }} </th>
            @endforeach
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
           @foreach ($bookings as $booking)
          <tr>
          <th scope="">{{ $booking -> id}}</th>
            <td>{{ $booking -> guest_full_name}}</td>
            <td>{{ $booking  -> guest_credit_card}}</td>
            <td>{{ $booking -> room}}</td>
            <td>{{ $booking -> from_date }}</td>
            <td>{{ $booking -> to_date}}</td>
            <td>{{ $booking  -> more_details}}</td>
            <td>
               <a href="{{
                   route('booking.show', $booking -> id)
               }}"> Vai</a>
               <a href="{{
                route('booking.edit', $booking -> id)
               }}"> Aggiorna</a>
               <form method="POST" id="delete-form-{{ $booking -> id }}" action="{{ route('booking.destroy', $booking -> id)}}">
                   @csrf
                   @method('DELETE')
                   <a href="#" onclick="document.getElementById('delete-form-{{ $booking -> id }}').submit()"> Elimina</a>
               </form>
            </td>
          </tr> 
               


          @endforeach
        </tbody>
      </table>

      @endsection
      
      
