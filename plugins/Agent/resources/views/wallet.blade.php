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

    <form action="{{route('agent.fund', $agent->id)}}" method= "POST">    
        @csrf

    
    <div class="form-group">
        <label for="exampleInputPassword1">Fund Wallet</label>
        <input type="number" class="form-control" id="name" placeholder="Enter Amount" name="wallet">
      </div>
      
    
    <button type="submit" class="btn btn-primary">Fund Wallet</button>
  </form>

   
       
</div>
@stop