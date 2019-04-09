@extends('layouts.app')

@section('content')
    @include('users.partials.action-buttons', ['user' => $user])
    <h2 class="page-header">
        {{ $user->name }} <small>@yield('subtitle')</small>
    </h2>
    @yield('user-content')

    <div class="text-center pdb50 pdt20">
    @can ('edit', $user)
        {{ link_to_route('users.edit', trans('app.edit'), [$user->id], ['class' => 'btn btn-primary']) }}
    @endcan
        {{ link_to_route('export.profile', trans('app.export'), [$user->id], ['class' => 'btn btn-primary']) }}
    </div>
@endsection
