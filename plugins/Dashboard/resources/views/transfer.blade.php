@extends('layouts.app')

@section('page-title', 'Agent')
@section('page-heading', 'Agent')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Transfer
    </li>
@stop

@section('content')
<div class="container">

    <form action="{{route('agent.make-transfer')}}" method= "POST">    
        @csrf

    
    
      <div class="form-group">
        <label for="exampleInputPassword1">Transaction Type</label>
        <select name="transaction_type" id="" class="form-control">
            <option value="">Kindly select a transaction Type</option>
            <option value="wallet transfer">Wallet Transfer</option>
            <option value="fund transfer">Fund Transfer</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Agent</label>
        <select name="agent_name" id="" class="form-control">
            <option value="">Kindly select an agent</option>
            @foreach ($agent as $agents)
            <option value="{{$agents->name}}">{{$agents->name}}</option>
            @endforeach
        </select>
      </div>
     
      <div class="form-group">
        <label for="exampleInputPassword1">Amount</label>
        <input type="number" class="form-control" id="name" placeholder="Enter Amount" name="amount">
      </div>
      <div class="form-group">
        <H4> Only fill this if transaction Type is Fund transfer</H4>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Account Number</label>
        <input type="number" class="form-control" id="name" placeholder="Enter Amount" name="account_number">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Bank</label>
        <input type="number" class="form-control" id="name" placeholder="Enter Amount" name="bank">
      </div>
      
      {{-- @if(Auth::user()->id == $agent->id)
      <input type="hidden" name=balance_before value="{{$agent->wallet_balance}}">
      @endif --}}
    
    <button type="submit" class="btn btn-primary">Fund Wallet</button>
  </form>

   
       
</div>
@stop
