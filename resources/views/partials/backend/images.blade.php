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
                    @foreach($images as $image)
                        <img src="{{ $image->filename }}" alt="lol">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>