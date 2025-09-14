@extends('beautymail::templates.minty')

@section('content')



    @include('beautymail::templates.minty.contentStart')
    <tr>
        <td class="title">
            Greetings Admin <br />
        </td>
    </tr>
    <tr>
        <td>A new user just signup for {{ setting('site_name') }}</td>
    </tr>
    <tr>
        <td width="100%" height="10"></td>
    </tr>
    <tr>
        <td class="title">
            Users Details.
        </td>
    </tr>

    <tr>
        <td width="100%" height="10"></td>
    </tr>

    <tr>
        <td class="paragraph">
            Email  : {{ $user->email }}
        </td>
    </tr>
    <tr>
        <td class="paragraph">
            Phone  : {{ $user->phone }}
        </td>
    </tr>
    <tr>
        <td><hr /></td>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>

    <tr>
        <td class="title">
            Other users details can be found in users profile
        </td>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>
    <tr>
        <td>
            @include('beautymail::templates.minty.button', ['text' => 'View users detail', 'link' =>  route('admin.users.show', $user->id) ])
        </td>
    </tr>
    <tr>
        <td width="100%" height="25"></td>
    </tr>
    @include('beautymail::templates.minty.contentEnd')

@stop
