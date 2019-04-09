<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $user->name }} Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body bgcolor="#FFFFFF">
<div class="container">
    <h2 class="page-header text-center">
        {{ $user->name }} <small>{{ trans('user.profile') }}</small>
    </h2>
    <table>
        <tr>
            <td width="40%">
                <table class="table">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <div class="panel-body text-center">
                                {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-sm-4">{{ trans('user.name') }}</th>
                        <td class="col-sm-8">{{ $user->profileLink() }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('user.nickname') }}</th>
                        <td>{{ $user->nickname }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('user.gender') }}</th>
                        <td>{{ $user->gender }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('user.dob') }}</th>
                        <td>{{ $user->dob }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('user.birth_order') }}</th>
                        <td>{{ $user->birth_order }}</td>
                    </tr>
                    @if ($user->dod)
                        <tr>
                            <th>{{ trans('user.dod') }}</th>
                            <td>{{ $user->dod }}</td>
                        </tr>
                    @endif
                    @if ($user->email)
                        <tr>
                            <th>{{ trans('user.email') }}</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>{{ trans('user.phone') }}</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('user.address') }}</th>
                        <td>{!! nl2br($user->address) !!}</td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td width="60%">
                @include('users.partials.parent-spouse')
                @include('users.partials.childs')
                @include('users.partials.siblings')
            </td>
        </tr>
    </table>
</div>
</body>
</html>
