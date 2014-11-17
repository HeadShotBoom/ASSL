@extends('layout')

@section('content')
<?php
if(Auth::check()){
    $userId = Auth::user()->id;
}
?>
@if(isset($userId))
<div class="page-header">
    <h1 class="pushright">All Gigs</h1>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('GigController@create') }}" class="pushright btn btn-primary">Create Gig</a>
    </div>

    @if(Session::has('message'))
    <div class="panel-body">
        <p class="alert alert-info">{{Session::get('message')}}</p>
    </div>
    @endif

</div>

<table class="centered table table-striped">
    <thead>
    <tr>
        <th>Gig Name</th>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Gig Date</th>
        <th>Employee 1</th>
        <th>Employee 2</th>
        <th>Employee 3</th>
        <th>Files</th>
        <th>Contract</th>
        <th>Modify Gig</th>
    </tr>
    </thead>
    <tbody>
    @foreach($gig as $gig)
    <tr>
        <td>{{ $gig->gig_name }}</td>
        <td>{{ $gig->client_name }}</td>
        <td>{{ $gig->phone }}</td>
        <td>{{ $gig->email }}</td>
        <td>{{ $gig->gig_date }}</td>
        <td>{{ $gig->employee1 }}</td>
        <td>{{ $gig->employee2 }}</td>
        <td>{{ $gig->employee3 }}</td>
        <td><a href="./uploads/{{$gig->file}}" >Click Here</td>
        <td><a href="{{ action('PrintController@printgig', $gig->id) }}" class="btn btn-default">Export</a></td>
        <td><a href="{{ action('GigController@edit', $gig->id) }}" class="btn btn-default">Edit</a> / <a href="{{ action('GigController@delete', $gig->id) }}" class="btn btn-default">Delete</a> </td>
    </tr>
    @endforeach
    @else
    <h1>Please Login To Access System</h1>
    @endif


@stop