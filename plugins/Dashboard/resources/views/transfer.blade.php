@extends('layouts.app')

@section('page-title', 'Agent')
@section('page-heading', 'Agent')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Transfer
    </li>
@stop

@section('content')

@include('partials.messages')

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
          <label for="exampleInputPassword1">Transaction Type</label>
          <select name="bank_name" id="" class="form-control">
              <option value="">Kindly select Bank</option>
              <option value="Access Bank Plc">Access Bank Plc</option>
              <option value="Citibank Nigeria">Citibank Nigeria</option>
              <option value="Ecobank">Ecobank</option>
              <option value="FCMB">FCMB</option>
              <option value="Fidelity Bank">Fidelity Bank</option>
              <option value="First Bank">First Bank</option>
              <option value="GTB">GTB</option>
              <option value="Heritage Bank">Heritage Bank</option>
              <option value="Jaiz Bank">Jaiz Bank</option>
              <option value="Keystone Bank">Keystone Bank</option>
              <option value="Kuda Bank">Kuda Bank</option>
              <option value="Polaris Bank">Polaris Bank</option>
              <option value="Providus Bank">Providus Bank</option>
              <option value="Stanbic IBTC">Stanbic IBTC</option>
              <option value="Standard Chartered">Standard Chartered</option>
              <option value="Sterling Bank">Sterling Bank</option>
              <option value="UBA">UBA</option>
              <option value="Union Bank">Union Bank</option>
              <option value="Unity Bank">Unity Bank</option>
              <option value="Wema Bank">Wema Bank</option>
              <option value="Zenith Bank">Zenith Bank</option>     
          </select>
        </div>
      </div>
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