@extends('layout')

@section('content')
<div class="page-header">
    <h1>Gig View</h1>
</div>

<h1>Gig Name: {{ $gig->gig_name }}</h1>
<p>Client Name: {{ $gig->client_name }}</p>
<p>Phone: {{ $gig->phone }}</p>
<p>Email: {{ $gig->email }}</p>
<p>Event Date: {{ $gig->gig_date }}</p>
<p>Employee 1: {{ $gig->employee1 }}</p>
<p>Employee 2: {{ $gig->employee2 }}</p>
<p>Employee 3: {{ $gig->employee3 }}</p>
<a href="../uploads/{{ $gig->file }}">Attached Files</a>


@stop