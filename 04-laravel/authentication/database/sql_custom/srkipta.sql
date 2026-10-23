create database laravel_auth CHARACTER SET utf8mb4 collate utf8mb4_general_ci;

create user 'laravel-auth-user'@'localhost' identified by 'authpass123';

grant all PRIVILEGES on laravel_auth.* to 'laravel-auth-user'@'localhost';

flush PRIVILEGES;

use laravel_auth;