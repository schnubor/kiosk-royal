<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="categoryModal">Edit category</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'edit.category', 'style' => 'margin-bottom: 0;', 'class' => 'js-form']) !!}
                <div class="form-group">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', Input::old('title'), ['class' => 'form-control js-title', 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('position') !!}
                    <select name="position" class="form-control js-position">
                        <option disabled selected>Choose position</option>
                        @for($i = 1; $i <= $categories->count(); $i++)
                            <option value="{{ $i }}">Position {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('Font color') !!}
                    <input type="color" name="color" class="form-control js-color">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>