<div class="row">
    <div class="col-md-4">
        <div class="well">
            {!! Form::open(['route' => 'post.create.project', 'style' => 'margin-bottom: 0;']) !!}
                <div class="form-group">
                    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required', 'style' => 'resize: vertical;', 'rows' => '5']) !!}
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
                    <input type="color" class="form-control" value="#FFFFFF" name="color">
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
                        <th>Category</th>
                        <th>BG/Font</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($category->projects()->count())
                        @foreach($category->projects as $project)
                            <tr>
                                <td>{{ $project->position }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->category->title }}</td>
                                <td><span style="color: {{ $project->bgcolor }};">&#9679;</span> {{ $project->bgcolor }} / <span style="color: {{ $project->color }};">&#9679;</span> {{ $project->color }}</td>
                                <td>
                                    <button class="btn btn-default pull-right"><i class="fa fa-edit"></i></button>
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