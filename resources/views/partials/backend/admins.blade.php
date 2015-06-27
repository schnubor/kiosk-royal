<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Admins</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="well" style="margin-bottom: 0;">
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
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td class="text-right">
                                            {!! Form::open(['route' => ['delete.user', $user->id], 'style' => 'margin-bottom: 0;', 'onsubmit'=>'return confirm("Really want to delete '.$user->username.'?");']) !!}
                                                <input name="_method" type="hidden" value="DELETE">
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip',  'data-placement' => 'bottom', 'title' => 'Delete']) !!}
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