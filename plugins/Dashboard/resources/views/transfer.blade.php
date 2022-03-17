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
        <select name="transaction_type" id="" class="form-control" onchange="typeSelected(event)">
            <option value="">Kindly select a transaction Type</option>
            <option value="wallet transfer">Wallet Transfer</option>
            <option value="fund transfer">Fund Transfer</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Agent</label>
        <select name="agent_data" id="" class="form-control">
            <option value="">Kindly select an agent</option>
            @foreach ($agent as $agents)
            {{-- <option value="{{$agents->name}},{{$agents->id}}">{{$agents->name}}</option> --}}
                @if($agents->id != Auth::user()->id)
                    <option value="{{$agents->last_name . " ". $agents->first_name}},{{$agents->id}}">{{$agents->last_name . " ". $agents->first_name}}</option>
            {{-- <option value="{{$ag{{$agents->id}}">{{$agents->last_name . " ". $agents->first_name}}</option> --}}
                @endif
            @endforeach
        </select>
      </div>
     
      <div class="form-group">
        <label for="exampleInputPassword1">Amount</label>
        <input type="number" class="form-control" id="name" placeholder="Enter Amount" name="amount">
      </div>
      <div id="fund-transfer" style="display: none;">
        {{-- <div class="form-group">
          <H4> Only fill this if transaction Type is Fund transfer</H4>
        </div> --}}
        <div class="form-group">
          <label for="exampleInputPassword1">Account Number</label>
          <input type="number" class="form-control" id="name" placeholder="Enter Account Number" name="account_number">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Bank Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter Bank Name" name="bank_name">
        </div>
      </div>
      
      
      {{-- @if(Auth::user()->id == $agent->id)
      <input type="hidden" name=balance_before value="{{$agent->wallet_balance}}">
      @endif --}}
    
    <button type="submit" class="btn btn-primary">Fund Wallet</button>
  </form>

   
       
</div>
@stop

@section('scripts')
  <script type="text/javascript">
    function typeSelected(event){
      const fund = document.getElementById('fund-transfer')
      if(event.target.value === 'fund transfer'){
        fund.style.display = 'block'
      }else{
        fund.style.display = 'none'
      }
    }
  </script>
@endsection