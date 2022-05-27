@extends('layout')
@section('content')
@foreach ($patient_data as $patient)
@if($patient->id == session('id'))
<h2 class="patient_name">{{$patient->pusername}}</h2>
@endif
@endforeach
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
                    
    <tbody>
    @foreach ($books as $i)
    @if($i->user_id == session('id'))

    <tr>
        <td>{{ $i->bname }}</td>
        <td>{{ $i->date }}</td>
        <td>{{ $i->time }}</td>
        <td>
            <button class="edit_butt"><a href="/book/{{$i->id}}/edit" class="butt_link">Edit</a></button>     
        </td>
        <td>
            <form action="{{ route('book.destroy', $i->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="delete_butt"  >Delete</button>
            </form>
        </td>
    </tr>
    @endif
    @endforeach
</tbody>
@endsection