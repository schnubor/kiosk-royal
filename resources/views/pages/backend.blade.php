@extends('app')

@section('title')
    Backend
@endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Backend</h1>
            <p class="lead">Welcome back {{ Auth::user()->username }}.</p>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
            <a href="{{ route('home') }}" class="btn btn-sm btn-default"><i class="fa fa-fw fa-eye"></i> Show site</a>
        </div>
    </div>
    <div class="container">
        {{------------------ Admins ------------------}}
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Admins</strong>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="well">
                                {{-- Flash message --}}
                                @include('flash::message')
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {!! Form::open(['route' => 'post.create.user', 'style' => 'margin-bottom: 0;']) !!}
                                    <div class="form-group">
                                        {!! Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required',]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password_again', ['class' => 'form-control', 'placeholder' => 'Repeat Password', 'required' => 'required']) !!}
                                    </div>
                                    <div class="text-right">
                                        {!! Form::button('Add user', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>username</th>
                                        <th class="text-right">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td class="text-right">
                                                {!! Form::open(['route' => ['delete.user', $user->id], 'style' => 'margin-bottom: 0;', 'onsubmit'=>'return confirm("Really want to delete '.$user->username.'?");']) !!}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection