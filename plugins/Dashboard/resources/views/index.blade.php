@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-heading', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
       Agent Dashboard
    </li>
@stop

@section('content')
@include('partials.messages')

<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-body" >
            <h5 class="text-muted">Wallet Balance</h5>
            <div class="metric-value d-inline-block">
                <h1 class="mb-1">{{$agent->wallet->balance}}</h1>
            </div>
        </div>
        <div id="sparkline-revenue2"></div>
    </div>
</div>
<div class="col-md-6">
    <a href="{{ route('agent.transfer') }}" class="btn btn-primary btn-rounded float-right">
        <i class="fas fa-plus mr-2"></i>
        @lang('Make Transfer')
    </a>
</div>
<div class="table-responsive" id="users-table-wrapper">
    <h3>Transaction History</h3>
    <table class="table table-borderless table-striped">
        <thead>
        <tr>
            <th class="min-width-80">@lang('SN')</th>
            <th class="min-width-80">@lang('Agent')</th>
            <th class="min-width-80">@lang('Transaction Type')</th>
            <th class="min-width-80">@lang(' Status')</th>
        </tr>
        </thead>
        <tbody>
            @foreach($agent_trans as $agent_tran)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$agent_tran->agent->last_name. " " . $agent_tran->agent->first_name}}</td>
                <td>{{$agent_tran->transaction_type}}</td>
                <td>{{$agent_tran->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{$agent_trans->links()}}
</div>
  @stop
  @section('content')

  @include('partials.messages')
  