<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Categories</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well">
                            {!! Form::open(['route' => 'post.create.category', 'style' => 'margin-bottom: 0;', 'class' => 'form-inline']) !!}
                                <div class="form-group">
                                    <label for="color">Font color</label>
                                    <input type="color" class="form-control" value="#000000" name="color" style="width: 100px" >
                                </div>
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
                                {!! Form::button('Add category', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($categories as $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong><span class="badge">Pos. {{ $category->position }}</span> {{ $category->title }} <span style="color: {{ $category->color }};">&#9679;</span></strong>
                                    <div class="pull-right">
                                        <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#categoryModal"><i class="fa fa-edit"></i></button>
                                        {!! Form::open(['route' => ['delete.category', $category->id], 'style' => 'margin-bottom: 0; display: inline-block;', 'onsubmit'=>'return confirm("Really want to delete '.$category->title.'?");']) !!}
                                            <input name="_method" type="hidden" value="DELETE">
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-default']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @include('partials.backend.projects')
                                </div>
                            </div>                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>