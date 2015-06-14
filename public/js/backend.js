(function() {
  Vue.http.headers.common['X-CSRF-TOKEN'] = $('#CSRFtoken').attr('value');

  new Vue({
    el: '#admins',
    data: {
      newAdmin: {
        username: '',
        password: '',
        password_again: ''
      },
      submitted: false,
      passwordError: false
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
      },
      onSubmitForm: function(e) {
        var admin;
        e.preventDefault();
        admin = this.newAdmin;
        if (admin.password === admin.password_again) {
          this.admins.push(admin);
          this.newAdmin = {
            name: '',
            password: '',
            password_again: ''
          };
          this.$http.post('/user/create', admin);
          this.submitted = true;
          return this.passwordError = false;
        } else {
          return this.passwordError = true;
        }
      }
    }
  });

}).call(this);

//# sourceMappingURL=backend.js.map