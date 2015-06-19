<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Projects</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="well">
                            {!! Form::open(['route' => 'post.create.category', 'style' => 'margin-bottom: 0;']) !!}
                                <div class="form-group">
                                    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required', 'style' => 'resize: vertical;', 'rows' => '5']) !!}
                                </div>
                                <div class="form-group">
                                    <select name="position" id="position" class="form-control">
                                        <option disabled selected>Choose position</option>
                                        <option value="1">Position 1</option>
                                        <option value="2">Position 2</option>
                                        <option value="3">Position 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bgcolor">Background color</label>
                                    <input type="color" class="form-control" value="#00FF00">
                                    {!! Form::hidden('bgcolor') !!}
                                </div>
                                <div class="form-group">
                                    <label for="color">Font color</label>
                                    <input type="color" class="form-control" value="#FF0000">
                                    {!! Form::hidden('color') !!}
                                </div>
                                <div class="text-right">
                                    {!! Form::button('Add project', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Position</th>
                                    <th>Colors</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Test</td>
                                    <td>More testing</td>
                                    <td>1</td>
                                    <td>#FF0000 / #00FF00</td>
                                    <td>
                                        <button class="btn btn-default pull-right"><i class="fa fa-edit"></i></button>
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