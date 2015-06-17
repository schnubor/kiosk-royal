## Backend Boilerplate

Provides a simple `/backend` page with login and simple user management to add or remove other admins with access to the backend. The default credentials are `admin`/`admin` if nothing else is set in the environment variables. The superadmin won't be visible in the admins table in the backend and cannot be deleted.

### Setup

1. `composer install`
2. `npm install`
3. `gulp`
4. Set default user/pass in your environment variables (.env): `ADMIN_NAME` and `ADMIN_PASS`
5. `php artisan migrate`
6. `php artisan serve`
7. Enjoy!

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) so the same goes for this project.
