<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Images</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well">
                            <legend>Upload image</legend>
                            {!! Form::open(['route' => 'post.create.image', 'style' => 'margin-bottom: 0;', 'class' => 'form-inline', 'files' => true]) !!}
                                <div class="form-group">
                                    {!! Form::file('imageFile', ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                                <div class="form-group">
                                    <select name="project_id" class="form-control">
                                            <option selected disabled>Choose a project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {!! Form::button('Upload image', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>{{-- upload form --}}
                <div class="row">
                    <div class="col-md-12">
                        @foreach($images as $image)
                            <div class="col-md-3 thumbnail">
                                <img src="{{ '/uploads/'.$image->filename }}" alt="Image of {{ $image->project->title }}">
                                <div class="caption">
                                    <small style="color: #ccc;">{{ $image->filename }}</small><br>
                                    <h4>{{ $image->project->title }}</h4>
                                </div>
                                {!! Form::open(['route' => ['delete.image', $image->id], 'style' => 'margin-bottom: 0; display: inline-block;', 'onsubmit'=>'return confirm("Really want to delete that image?");', 'class' => 'pull-right']) !!}
                                    <input name="_method" type="hidden" value="DELETE">
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip',  'data-placement' => 'bottom', 'title' => 'Delete']) !!}
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>