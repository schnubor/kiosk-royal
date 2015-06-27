
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
    var button, id;
    button = $(event.relatedTarget);
    id = button.data('id');
    return $.getJSON('/project/' + id, function(data) {
      return console.log(data);
    });
  });

}).call(this);

//# sourceMappingURL=backend.js.map