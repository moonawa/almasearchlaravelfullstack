@extends('layouts.appadmin')
@section('contents')
<div class="col-md-12">
<div class="card p-5">
    <p>Evennement</p>
    <h1>{{ $event->nomevent }}</h1>
    @if(!$event->photo)
        <img src="{{ asset('admin/img/almafond3.jpg') }}" style ="width: 100%; height: 500px;" alt="...">
    @else
        <img src="/uploads/{{ $event->photo}} " style ="width: 100%; height: 500px;" alt="...">
    @endif
    <p>{!! $event->description !!}</p>
</div>
</div> 
@endsection