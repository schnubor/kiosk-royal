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
                                <form method="POST" v-on="submit:onSubmitForm" accept-charset="UTF-8" style="margin-bottom: 0;">
                                    {!! Form::token() !!}
                                    <div class="form-group">
                                        {!! Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required', 'v-model' => 'newAdmin.username']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required', 'v-model' => 'newAdmin.password']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password_again', ['class' => 'form-control', 'placeholder' => 'Repeat Password', 'required' => 'required', 'v-model' => 'newAdmin.password_again']) !!}
                                    </div>
                                    <div class="alert alert-success" v-if="submitted"><i class="fa fa-fw fa-check"></i> User added successful.</div>
                                    <div class="alert alert-danger" v-if="passwordError"><i class="fa fa-fw fa-warning"></i> Passwords must match.</div>
                                    <div class="text-right">
                                        {!! Form::button('Add user', ['type' => 'submit', 'class' => 'btn btn-primary', 'v-attr' => 'disabled:errors']) !!}
                                    </div>
                                </form>
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
                                            <form method="POST" accept-charset="UTF-8" style="margin-bottom: 0;" v-on="submit:onDeleteForm">
                                                <input name="_method" type="hidden" value="DELETE">
                                                {!! Form::token() !!}
                                                <input id="userId" name="userId" type="hidden" value="@{{ id }}">
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