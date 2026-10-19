# SoftPolli Website

A company website and admin content-management panel built with Laravel. The public site presents company information, services, products, clients, testimonials, and contact details. Authorized administrators can manage website content and review contact messages.

## Features

- Public home, about, and contact pages
- Admin-only dashboard and content management
- Manage sliders, company settings, about content, technologies, products, services, clients, membership cards, testimonials, navigation, and social links
- Review contact submissions and send replies
- Login and password reset flows
- Contact form request throttling

## Technology Stack

- PHP 8.2 or later
- Laravel 12
- SQLite by default (can be configured for another Laravel-supported database)
- Node.js and npm, with Vite and Tailwind CSS for frontend assets
- Laravel Breeze authentication and CAPTCHA integration

## Requirements

- PHP 8.2+ and Composer
- Node.js version supported by Vite 7 and npm
- A database supported by Laravel

Enable the PHP extensions required by Laravel and the database driver you choose.

## Local Installation

1. Clone the repository and enter the project directory.

   ```sh
   git clone <repository-url>
   cd <cloned-repository-folder>
   ```

2. Install PHP dependencies and create your local environment file.

   ```sh
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

   On Windows Command Prompt, use `copy .env.example .env` instead of `cp`.

3. Configure the database in `.env`. The example configuration uses SQLite. Create the SQLite file before running migrations if it does not already exist:

   ```sh
   php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
   ```

   For MySQL or another supported database, set the appropriate `DB_*` values in `.env` instead.

4. Run database migrations and seed initial content.

   Before seeding, set `ADMIN_NAME`, `ADMIN_EMAIL`, and a unique `ADMIN_PASSWORD` in your local `.env` file. The admin seeder intentionally has no default password and stops with an error if these credentials are missing. Do not commit your `.env` file or share its credentials.

   ```sh
   php artisan migrate --seed
   ```

   The company logo and contact email are intentionally left unset in the seed defaults. Add the SoftPolli logo and current contact details through the admin settings before publishing the site.

   This seeds the configured admin account and initial website content. The full `php artisan db:seed` command invokes `UserSeeder` along with the other seeders.

5. Create Laravel's public upload link so uploaded logos and other media can be served:

   ```sh
   php artisan storage:link
   ```

6. Install and build frontend assets.

   ```sh
   npm install
   npm run build
   ```

7. Start the local Laravel server.

   ```sh
   php artisan serve
   ```

   Open the URL printed by Artisan, usually `http://127.0.0.1:8000`. The admin login page is available at `/login`; after signing in, open `/admin/dashboard`.

For frontend development with Vite hot reload, run `npm run dev` in a separate terminal instead of building assets.

## Environment Configuration

Important settings are configured through `.env`, including:

- `APP_URL` and application environment/debug settings
- `DB_CONNECTION` and database credentials
- `ADMIN_NAME`, `ADMIN_EMAIL`, and `ADMIN_PASSWORD` for the admin seeder
- `MAIL_*` settings for email delivery
- reCAPTCHA keys if using the contact form's CAPTCHA integration

Keep `.env` private. Do not commit real passwords, API keys, or other secrets to GitHub.

## Tests

Run the automated test suite with:

```sh
php artisan test
```

## Production Notes

- Set `APP_ENV=production` and `APP_DEBUG=false`.
- Use a production database and configure mail and CAPTCHA credentials as required.
- Set a unique production admin email and password in the deployment environment before seeding; never use development credentials.
- Build frontend assets with `npm run build` and deploy the generated `public/build` files.
- Run `php artisan storage:link` on the server so public uploads are accessible.
- Configure the web server document root to the Laravel `public` directory.

## License

This project is distributed under the license specified in `composer.json` (MIT).
