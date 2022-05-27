@extends('layout')
@section('content')
<@foreach ($clinic_data as $clinic)
@if($clinic->id == session('id_clinic'))
<h2 class="clinic_name">{{$clinic->cname}}</h2>
@endif
@endforeach
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
    </thead>
                    
    <tbody>
    @foreach ($books as $i)
    @if($i->clinic_id == session('id_clinic'))

    <tr>
        <td>{{ $i->bname }}</td>
        <td>{{ $i->date }}</td>
        <td>{{ $i->time }}</td>
    </tr>
    @endif
    @endforeach
</tbody>
@endsection