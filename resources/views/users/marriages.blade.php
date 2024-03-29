@extends('layouts.user-profile')

@section('subtitle', trans('user.marriages'))

@section('user-content')

<div class="row">
    @foreach ($marriages as $marriage)
    <div class="col-md-4">
        <div class="panel panel-default">
            <table class="table table-condensed">
                <tr><th class="col-xs-5">{{ trans('couple.husband') }}</th><td>{{ $marriage->husband->profileLink() }}</td></tr>
                <tr><th>{{ trans('couple.wife') }}</th><td>{{ $marriage->wife->profileLink() }}</td></tr>
                <tr><th>{{ trans('couple.marriage_date') }}</th><td>{{ $marriage->marriage_date }}</td></tr>
                @if ($marriage->divorce_date)
                <tr><th>{{ trans('couple.divorce_date') }}</th><td>{{ $marriage->divorce_date }}</td></tr>
                @endif
                <tr><th>{{ trans('couple.childs_count') }}</th><td>{{ $marriage->childs_count }}</td></tr>
                {{-- <tr><th>{{ trans('couple.grand_childs_count') }}</th><td>?</th></tr> --}}
            </table>
            <div class="panel-footer">
                {{ link_to_route('couples.show', trans('couple.show'), [$marriage->id], ['class' => 'btn btn-success btn-xs']) }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
