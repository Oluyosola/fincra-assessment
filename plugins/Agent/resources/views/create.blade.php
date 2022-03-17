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
  @include('partials.messages')

    <form action="{{route('agent.add')}}" method= "POST">    
        @csrf

    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Agent's Name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Phone Number</label>
        <input type="number" class="form-control" id="phone" placeholder="Enter Agent's Phone Numebr" name="phone">
      </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

   
       
</div>
@stop
