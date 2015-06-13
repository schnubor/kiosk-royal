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
        <div class="row">
            <div class="col-md-12">
                <div id="admins" class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Admins</strong>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="well">
                                {!! Form::open(['route' => 'post.create.user', 'method' => 'POST', 'style' => 'margin-bottom: 0;', 'v-on' => 'onSubmitForm ']) !!}
                                    <div class="form-group">
                                        {!! Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required', 'v-model' => 'newAdmin.username']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required', 'v-model' => 'newAdmin.password']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password_again', ['class' => 'form-control', 'placeholder' => 'Repeat Password', 'required' => 'required', 'v-model' => 'newAdmin.password_again']) !!}
                                    </div>
                                    <div class="text-right">
                                        {!! Form::submit('Add user', ['class' => 'btn btn-primary', 'v-attr' => 'disabled:errors']) !!}
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
                                    <tr v-repeat="admins">
                                        <td>@{{ username }}</td>
                                        <td class="text-right">
                                            <form method="POST" action="http://localhost:8000/user/@{{ id }}/delete" accept-charset="UTF-8" style="margin-bottom: 0;">
                                                <input name="_method" type="hidden" value="DELETE">
                                                {!! Form::token() !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection