
/*
    Modals
 */

(function() {
  $('#categoryModal').on('show.bs.modal', function(event) {
    var button, id;
    button = $(event.relatedTarget);
    id = button.data('id');
    return $.getJSON('/category/' + id, function(data) {
      console.log(data.title);
      $('#categoryModal').find('.js-form').attr('action', '/category/' + data.id + '/edit');
      $('#categoryModal').find('.js-title').val(data.title);
      $('#categoryModal').find('.js-position').val(data.position);
      return $('#categoryModal').find('.js-color').val(data.color);
    });
  });

  $('#projectModal').on('show.bs.modal', function(event) {
    var button, catId, id;
    button = $(event.relatedTarget);
    id = button.data('id');
    catId = button.data('categoryid');
    return $.getJSON('/project/' + id, function(data) {
      $('#projectModal').find('.js-form').attr('action', '/project/' + data.id + '/edit');
      $('#projectModal').find('.js-title').val(data.title);
      $('#projectModal').find('.js-description').val(data.description);
      $('#projectModal').find('.js-position').val(data.position);
      $('#projectModal').find('.js-color').val(data.color);
      $('#projectModal').find('.js-bgcolor').val(data.bgcolor);
      return $.getJSON('/category/' + catId, function(data) {
        var i, len, project, ref, results;
        ref = data.projects;
        results = [];
        for (i = 0, len = ref.length; i < len; i++) {
          project = ref[i];
          results.push($('#projectModal').find('.js-position').append('<option value="' + project.position + '">Position ' + project.position + '</option>'));
        }
        return results;
      });
    });
  });

  $('#projectModal').on('hidden.bs.modal', function(event) {
    return $('#projectModal').find('.js-position').html('<option disabled selected>Choose position</option>');
  });

}).call(this);

//# sourceMappingURL=backend.js.map