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
            <th class="min-width-80">@lang('Agent')</th>
            <th class="min-width-80">@lang('Transaction Type')</th>
            <th class="min-width-100">@lang('Amount')</th>
            <th class="min-width-100">@lang('Balance Before')</th>
            <th class="min-width-80">@lang('Balance After')</th>
            <th class="min-width-80">@lang(' Status')</th>
        </tr>
        </thead>
        <tbody>
  @stop
