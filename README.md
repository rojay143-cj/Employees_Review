# Project Name

Brief description of your Laravel project.

## Requirements

- PHP >= 8.0
- Composer
- MySQL or Install Xampp
- Node.js & npm

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/your-project.git
   cd your-project

   Installation Guide:
    [
        Install PHP dependencies with Composer:
        command: composer install

        Copy .env file and set your environment variables:
        command: cp .env.example .env

        Open .env set the MySQL to activate database connection:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nextgen
        DB_USERNAME=root
        DB_PASSWORD=

        -Run the xampp

        Generate application key:
        command: php artisan key:generate

        Run database migrations:
        command: php artisan migrate
    ]

    Tailwindcss Installation Guide:
    [
        Install Node dependencies (including Tailwind CSS):
        command: npm install

        Install Tailwind CSS via npm if not included already:
        commands: 
        npm install -D tailwindcss postcss autoprefixer 
        npx tailwindcss init

        Configure Tailwind by updating tailwind.config.js and including Tailwind directives in your CSS (e.g., resources/css/app.css):
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        Build assets:
        command: npm run dev

        Start the Laravel development server:
        command: php artisan serve
    ]

    RUNNING TESTS
    Run PHPUnit tests:
    command: vendor/bin/phpunit

    To generate a code coverage report (requires Xdebug):
    vendor/bin/phpunit --coverage-html coverage/

    Open coverage/index.html in your browser to view the report.