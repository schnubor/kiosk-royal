(function() {
  new Vue({
    el: '#admins',
    data: {
      newAdmin: {
        username: '',
        password: ''
      }
    },
    computed: {
      errors: function() {
        var ret;
        ret = true;
        _.each(newAdmin, function(admin) {
          if (admin.username) {
            return ret = false;
          }
        });
        return ret;
      }
    },
    ready: function() {
      return this.fetchUsers();
    },
    methods: {
      fetchUsers: function() {
        return this.$http.get('/user', function(admins) {
          return this.$set('admins', admins);
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=backend.js.map