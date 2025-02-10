# Laravel Project

## 🚀 About This Project

A simple Job Listing Web Application using Laravel. The purpose of this project is to showcase the benefits of using the Laravel framework to build
the frontedn and backend mechanisms for a secure and efficient Web Application.

## 📋 Prerequisites

Before running this project, ensure you have the following installed:

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or PostgreSQL (or any database you plan to use)

## ⚡ Installation

1. **Clone the repository**

   ```sh
   git clone https://github.com/your-username/your-repository.git
   cd your-repository
   ```

2. **Install PHP dependencies**

   ```sh
   composer install
   ```

3. **Install JavaScript dependencies**

   ```sh
   npm install
   ```

4. **Set up environment variables**

   ```sh
   cp .env.example .env
   ```

   - Update `.env` with your database credentials and app settings.

5. **Generate application key**

   ```sh
   php artisan key:generate
   ```

6. **Run database migrations**

   ```sh
   php artisan migrate --seed
   ```

   *(Include **`--seed`** if you have seeders to populate the database)*

7. **Compile assets**

   - For development mode:
     ```sh
     npm run dev
     ```
   - For production mode:
     ```sh
     npm run build
     ```

8. **Run the application**

   ```sh
   php artisan serve
   ```

   The application should now be available at `http://127.0.0.1:8000`

## 🛠 Deployment

For deployment on a production server:

- Use `php artisan config:cache` to cache configuration.
- Run `php artisan route:cache` and `php artisan view:cache` for optimization.
- Set proper file permissions for `storage` and `bootstrap/cache`.
- Ensure you have a queue worker running (`php artisan queue:work`).

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

**Happy coding! 🚀**

