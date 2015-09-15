###
    Modals
###

# Edit Category
$('#categoryModal').on 'show.bs.modal', (event) ->
    button = $(event.relatedTarget) # Button that triggered the modal
    id = button.data('id') # Extract info from data-* attributes
    $.getJSON '/category/'+id, (data) ->
        console.log data.title
        # fill in the form
        $('#categoryModal').find('.js-form').attr('action', '/category/'+data.id+'/edit')
        $('#categoryModal').find('.js-title').val(data.title)
        $('#categoryModal').find('.js-position').val(data.position)
        $('#categoryModal').find('.js-color').val(data.color)

# Edit Project
$('#projectModal').on 'show.bs.modal', (event) ->
    # Button that triggered the modal
    button = $(event.relatedTarget)
    # Extract info from data-* attributes
    id = button.data('id') 
    catId = button.data('categoryid')
    # Get project data
    $.getJSON '/project/'+id, (data) ->
        # fill in the form
        $('#projectModal').find('.js-form').attr('action', '/project/'+data.id+'/edit')
        $('#projectModal').find('.js-title').val(data.title)
        $('#projectModal').find('.js-description').val(data.description)
        $('#projectModal').find('.js-position').val(data.position)
        $('#projectModal').find('.js-color').val(data.color)
        $('#projectModal').find('.js-bgcolor').val(data.bgcolor)
        $.getJSON '/category/'+catId, (data) ->
            for project in data.projects
                $('#projectModal').find('.js-position').append '<option value="'+project.position+'">Position '+project.position+'</option>'

# Reset Edit Project Modal
$('#projectModal').on 'hidden.bs.modal', (event) ->
    $('#projectModal').find('.js-position').html '<option disabled selected>Choose position</option>'