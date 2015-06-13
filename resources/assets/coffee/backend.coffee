new Vue
    el: '#admins'

    data:
        newAdmin:
            username: ''
            password: ''
            password_again: ''

    computed:
        errors: ->
            for key of @newAdmin
                unless @newAdmin[key]
                    return true
            return false

    ready: ->
        @fetchUsers()

    methods:
        fetchUsers: ->
            @$http.get '/user', (admins) ->
                @$set('admins', admins)