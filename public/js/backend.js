(function() {
  new Vue({
    el: '#admins',
    data: {
      newAdmin: {
        username: '',
        password: '',
        password_again: ''
      }
    },
    computed: {
      errors: function() {
        var key;
        for (key in this.newAdmin) {
          if (!this.newAdmin[key]) {
            return true;
          }
        }
        return false;
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