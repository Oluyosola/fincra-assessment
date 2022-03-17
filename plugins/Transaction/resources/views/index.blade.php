@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('page-heading', 'Dashboard')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
Transaction    
</li>
@stop

@section('content')
@include('partials.messages')

<div class="table-responsive" id="users-table-wrapper">
    <h3>Transaction History</h3>
    <table class="table table-borderless table-striped">
        <thead>
        <tr>
            <th class="min-width-80">@lang('SN')</th>
            <th class="min-width-80">@lang('Sender')</th>
            <th class="min-width-80">@lang('Agent')</th>
            <th class="min-width-80">@lang('Transaction Type')</th>
            <th class="min-width-100">@lang('Amount')</th>
            <th class="min-width-100">@lang('Balance Before')</th>
            <th class="min-width-80">@lang('Balance After')</th>
            <th class="min-width-80">@lang(' Status')</th>
        </tr>
        </thead>
        <tbody>
            
            @foreach ($transaction as $transactions)
            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$transactions->sender->last_name. " " . $transactions->sender->first_name}}</td>
                <td>{{$transactions->agent->last_name. " " . $transactions->agent->first_name}}</td>
                <td>{{$transactions->transaction_type}}</td>
                <td>{{$transactions->amount}}</td>
                <td>{{$transactions->balance_before}}</td>
                <td>{{$transactions->balance_after}}</td>
                <td>{{$transactions->status}}</td>
                 

            </tr>
            
                
            @endforeach
        </tbody>
    </table>
</div>
<div class="text-center">
{{ $transaction->links() }}
</div>

  @stop
