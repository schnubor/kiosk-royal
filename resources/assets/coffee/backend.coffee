Vue.http.headers.common['X-CSRF-TOKEN'] = $('#CSRFtoken').attr('value')
new Vue
    el: '#admins'

    data:
        newAdmin:
            username: ''
            password: ''
            password_again: ''

        submitted: false
        passwordError: false

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
                console.log @admins

        onSubmitForm: (e) ->
            e.preventDefault()
            admin = @newAdmin

            if admin.password is admin.password_again
                # update admins list
                @admins.push admin
                console.log @admins
                # reset inputs of form
                @newAdmin = 
                    name: ''
                    password: ''
                    password_again: ''
                # send POST ajax request
                @$http.post '/user/create', admin
                # show success message
                @submitted = true
                @passwordError = false
            else
                @passwordError = true

        onDeleteForm: (e) ->
            e.preventDefault()
            data = 
                id: '1' # get value from input[name="id"]
            # remove admin with id from admins array
            # send ajax request to delete admin
            @$http.post '/user/delete', data