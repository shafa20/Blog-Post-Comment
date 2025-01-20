1. git clone https://github.com/shafa20/Blog-Post-Comment.git
2.composer install or update(if required)
3.cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog-comment-system   (inside db folder is a databse name blog-comment-system)
DB_USERNAME=root
DB_PASSWORD= your password

4.php artisan key:generate
5.php artisan migrate
6. npm install and npm run dev
7.php artisan serve