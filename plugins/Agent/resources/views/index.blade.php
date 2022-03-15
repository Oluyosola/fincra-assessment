@extends('layouts.app')

@section('page-title', 'Agent')
@section('page-heading', 'Agent')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Agent
    </li>
@stop

@section('content')
    <table>
        <tr>
            <th>SN</th>
            <th> Agent Name</th>
            <th> Transaction Count</th>
            <th> Wallet Balance</th>
        </tr>
    </table>
@stop
