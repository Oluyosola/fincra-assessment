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
                        <input type="text"
                               class="form-control input-solid"
                               name="search"
                               value="{{ Request::get('search') }}"
                               placeholder="@lang('Search for Agents...')">

                            <span class="input-group-append">
                                @if (Request::has('search') && Request::get('search') != '')
                                    <a href="{{ route('agent.index') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                <button class="btn btn-light" type="submit" id="search-users-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </span>
                    </div>
                </div>

                <div class="col-md-2 mt-2 mt-md-0">
                    {{-- {!!
                        Form::select(
                            'status',
                            $statuses,
                            Request::get('status'),
                            ['id' => 'status', 'class' => 'form-control input-solid']
                        )
                    !!} --}}
                </div>

                <div class="col-md-6">
                    <a href="{{ route('agent.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        @lang('Add Agent')
                    </a>
                </div>
            </div>
        </form>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-80">@lang('Name')</th>
                    <th class="min-width-100">@lang('Email')</th>
                    <th class="min-width-80">@lang('Phone Number')</th>
                    <th class="min-width-80">@lang('Wallet Balance')</th>
                    <th class="text-center min-width-150">@lang('Action')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($agents))
                        @foreach ($agents as $agent)
                            {{-- @include('user.partials.row') --}}
                            <tr>
                            <td>{{$agent->name}}</td>
                            <td>{{$agent->email}}</td>
                            <td>{{$agent->phone_number}}</td>
                            <td>{{$agent->wallet_balance}}</td>
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

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#agent-form").submit();
        });
    </script>
@stop
