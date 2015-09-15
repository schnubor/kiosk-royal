<div class="row">
    <div class="col-md-4">
        <div class="well">
            <legend>New Project</legend>
            {!! Form::open(['route' => 'post.create.project', 'style' => 'margin-bottom: 0;']) !!}
                <div class="form-group">
                    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Description', 'style' => 'resize: vertical;', 'rows' => '5']) !!}
                </div>
                {!! Form::hidden('category_id', $category->id) !!}
                <div class="form-group">
                    <select name="position" id="projectPosition" class="form-control">
                        <option disabled selected>Choose position</option>
                        @for($i = 1; $i <= $category->projects()->count()+1; $i++)
                            <option value="{{ $i }}">Position {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="bgcolor">Background color</label>
                    <input type="color" class="form-control" value="#a4def1" name="bgcolor">
                </div>
                <div class="form-group">
                    <label for="color">Font color</label>
                    <input type="color" class="form-control" value="#000000" name="color">
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
                        <th>Pos.</th>
                        <th>Title</th>
                        <th>BG/Font</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($category->projects()->count())
                        @foreach($category->projects->sortBy('position') as $project)
                            <tr>
                                <td>{{ $project->position }}</td>
                                <td>{{ $project->title }}</td>
                                <td><span style="color: {{ $project->bgcolor }};">&#9679;</span> {{ $project->bgcolor }} / <span style="color: {{ $project->color }};">&#9679;</span> {{ $project->color }}</td>
                                <td>
                                    <div class="pull-right">
                                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#projectModal" data-id="{{ $project->id }}" data-categoryid="{{ $category->id }}"><i class="fa fa-edit"></i></button>
                                        {!! Form::open(['route' => ['delete.project', $project->id], 'style' => 'margin-bottom: 0; display: inline-block;', 'onsubmit'=>'return confirm("Really want to delete '.$project->title.'? You will also delete all images of the project.");']) !!}
                                            <input name="_method" type="hidden" value="DELETE">
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip',  'data-placement' => 'bottom', 'title' => 'Delete']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @if($category->projects()->count() === 0)
            <div class="text-left"><strong class="h4">No projects yet.</strong></div>
        @endif
    </div>
</div>