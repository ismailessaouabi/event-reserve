@extends('pages.layouts')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ticket</h1>
            <p>{{$transaction->user->name}}</p>
            <p>{{$transaction->event->name}}</p>
            <a href="{{route('tickets.download', $transaction->id)}}">dawnlaod ticket</a>
        </div>
    </div>
@endsection
    