new Vue
    el: '#admins'

    data:
        newAdmin:
            username: ''
            password: ''

    computed:
        errors: ->
            ret = true
            _.each newAdmin, (admin) ->
                ret = false if admin.username
            return ret

    ready: ->
        this.fetchUsers()

    methods:
        fetchUsers: ->
            this.$http.get '/user', (admins) ->
                this.$set('admins', admins)