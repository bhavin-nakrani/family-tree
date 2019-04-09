<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $user->name }} Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
        body {
            font-family: Raleway,sans-serif;
            font-size: 14px;
        }
        .left-table { padding: 0 20px;}
        .left-table th, .family-tabel th { text-align: left;}
        .list-group { list-style: none; line-height: 1.5em; margin: 0;}
        h3 { border-bottom: 1px gray dashed;}
        td { line-height: 1.8em; vertical-align: top;}
    </style>
</head>

<body bgcolor="#FFFFFF">
<div class="container">
    <h2 style="text-align: center;">
        {{ $user->name }} <small>{{ trans('user.profile') }}</small>
    </h2>
    <table width="100%" style="border: 1px solid black;">
        <tr>
            <td width="40%">
                <table class="left-table" width="100%" style="border-right: 1px solid black;">
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <div class="text-center">
                                {{ userPhoto($user, ['style' => '']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="col-sm-4">{{ trans('user.name') }}</th>
                        <td class="col-sm-8">{{ $user->name }}</td>
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
                <table class="family-tabel" width="100%">
                    <tbody>
                        <tr>
                            <td colspan="2"><h3>{{ __('user.family') }}</h3></td>
                        </tr>
                        <tr>
                            <th>{{ __('user.father') }}</th>
                            <td>{{ !empty($user->father) ? $user->father->name : ''}}</td>
                        </tr>
                        <tr>
                            <th>{{ __('user.mother') }}</th>
                            <td>{{ !empty($user->mother) ? $user->mother->name : ''}}</td>
                        </tr>
                        @if ($user->parent)
                            <tr>
                                <th>{{ __('user.parent') }}</th>
                                <td>{{ $user->parent->husband->name }} & {{ $user->parent->wife->name }}</td>
                            </tr>
                        @endif
                        @if ($user->gender_id == 1)
                            <tr>
                                <th>{{ __('user.wife') }}</th>
                                <td>
                                    @if ($user->wifes->isEmpty() == false)
                                        @foreach($user->wifes as $wife)
                                            <div>{{ $wife->name }}</div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr>
                                <th>{{ __('user.husband') }}</th>
                                <td>
                                    @if ($user->husbands->isEmpty() == false)
                                        @foreach($user->husbands as $husband)
                                            <div>{{ $husband->name }}</div>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td colspan="2"><h3>{{ __('user.childs') }}</h3></td>
                        </tr>
                        @forelse($user->childs as $child)
                            <tr>
                                <td colspan="2">
                                {{ $child->name }} ({{ $child->gender }})
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">{{ __('app.childs_were_not_recorded') }}</td>
                            </tr>
                        @endforelse

                        <tr>
                            <td colspan="2"><h3>{{ trans('user.siblings') }}</h3></td>
                        </tr>
                        @foreach($user->siblings() as $sibling)
                            <tr>
                                <td colspan="2">
                                    {{ $sibling->name }} ({{ $sibling->gender }})
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
