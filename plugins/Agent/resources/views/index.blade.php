@extends('layouts.app')

@section('page-title', __('Agents'))
@section('page-heading', __('Agents'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('Agents')
    </li>
@stop

@section('content')

@include('partials.messages')

<div class="card">
    <div class="card-body">

        <form action="" method="GET" id="agent-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2">
                    <div class="input-group custom-search-form">
                        <h3>Agents Table</h3>
                        
                    </div>
                </div>

                <div class="col-md-2 mt-2 mt-md-0">
                    
                </div>

                
            </div>
        </form>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-80">@lang('SN')</th>

                    <th class="min-width-80">@lang('Name')</th>
                    <th class="min-width-100">@lang('Username')</th>
                    <th class="min-width-100">@lang('Email')</th>
                    <th class="min-width-80">@lang('Phone Number')</th>
                    <th class="min-width-80">@lang('Wallet Balance')</th>
                    <th class="text-center min-width-150">@lang('Action')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($users))
                        @foreach ($users as $agent)
                            {{-- @include('user.partials.row') --}}
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$agent->last_name. " ". $agent->first_name}}</td>
                            @if($agent->username == null)
                            <td>Nill</td>
                            @else
                            <td>{{$agent->username}}</td>
                            @endif
                            <td>{{$agent->email}}</td>
                            <td>{{$agent->phone}}</td>
                            <td>{{$agent->wallet->balance}}</td>
                            <td class="text-center align-middle">
                                <div class="dropdown show d-inline-block">
                                    <a class="btn btn-icon"
                                       href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a href="{{ route('agent.fund-wallet', $agent->id) }}" class="dropdown-item text-gray-500">Fund Wallet
                                        </a>

                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><em>@lang('No records found.')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- {!! $users->render() !!} --}}
<div>
    {{$users->links()}}

</div>
@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#agent-form").submit();
        });
    </script>
    
@stop
