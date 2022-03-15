@extends('layouts.app')

@section('page-title', 'Agent')
@section('page-heading', 'Agent')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Agent
    </li>
@stop

@section('content')
<div class="container">
   <form action="{{route('add')}}" method= "POST">
       <label for="">Name</label>
        <input type="text" class="form-control">
        <label for="">Email Address</label>
        <input type="text">
        <label for="">Phone Number</label>
        <input type="number" class>

   </form>
</div>
@stop
