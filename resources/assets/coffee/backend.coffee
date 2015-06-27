###
    Modals
###

# Edit Category
$('#categoryModal').on 'show.bs.modal', (event) ->
    button = $(event.relatedTarget) # Button that triggered the modal
    id = button.data('id') # Extract info from data-* attributes
    $.getJSON '/category/'+id, (data) ->
        console.log data.title
        # fill in form
        $('#categoryModal').find('.js-form').attr('action', '/category/'+data.id+'/edit')
        $('#categoryModal').find('.js-title').val(data.title)
        $('#categoryModal').find('.js-position').val(data.position)
        $('#categoryModal').find('.js-color').val(data.color)

# Edit Project
$('#projectModal').on 'show.bs.modal', (event) ->
    button = $(event.relatedTarget) # Button that triggered the modal
    id = button.data('id') # Extract info from data-* attributes
    $.getJSON '/project/'+id, (data) ->
        console.log data
