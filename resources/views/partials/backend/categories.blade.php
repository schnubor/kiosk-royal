<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Categories</strong>
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
                                    <select name="position" id="position" class="form-control">
                                        <option disabled selected>Choose position</option>
                                        @for($i = 1; $i <= $categories->count()+1; $i++)
                                            <option value="{{ $i }}">Position {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="color">Font color</label>
                                    <input type="color" class="form-control" value="#000000" name="color">
                                </div>
                                <div class="text-right">
                                    {!! Form::button('Add category', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Position</th>
                                    <th>Font color</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->position }}</td>
                                        <td>{{ $category->color }}</td>
                                        <td class="text-right">
                                            <button class="btn btn-default" data-toggle="modal" data-target="#categoryModal"><i class="fa fa-edit"></i></button>
                                            {!! Form::open(['route' => ['delete.category', $category->id], 'style' => 'margin-bottom: 0; display: inline-block;', 'onsubmit'=>'return confirm("Really want to delete '.$category->title.'?");']) !!}
                                                <input name="_method" type="hidden" value="DELETE">
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-default']) !!}
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