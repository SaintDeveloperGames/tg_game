
ALTER USER root IDENTIFIED WITH mysql_native_password BY 'password';
-- Создаём базу данных
CREATE DATABASE db_tg charset utf8mb4;
-- Переключаемся на созданную базу данных
USE db_tg;
-- Создаем таблицу users
CREATE TABLE users (
    id VARCHAR(255) UNIQUE NOT NULL PRIMARY KEY, 
    first_name VARCHAR(255) NOT NULL,
    max_score INT(10)
);

-- Задаём глобальную опцию, позволяющую удалённое подключение без необходимости указывать хост
SET GLOBAL log_bin_trust_function_creators = 1;