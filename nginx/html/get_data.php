<?php
    include("config.php");

    // Проверяем подключение к базе данных
    if (!$connections) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }

    // Получаем ID из POST-запроса и проверяем его наличие
    $id = $_POST['userID'] ?? null;

    // Если ID передан и является целым числом, выполняем запрос
    if ($id !== null) {
        // Используем подготовленное выражение для предотвращения SQL-инъекций
        $stmt = mysqli_prepare($connections, "SELECT max_score FROM `users` WHERE `id` = ?");
        
        // Проверка, что подготовленное выражение создано успешно
        if ($stmt) {
            // Привязываем параметр и выполняем запрос
            mysqli_stmt_bind_param($stmt, "s", $id); // "s" означает, что параметр - это строка
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $max_score);
            mysqli_stmt_fetch($stmt);
            
            // Проверяем, найден ли пользователь
            if ($max_score !== null) {
                echo $max_score;
            } else {
                echo "Запись не найдена.";
            }
            
            // Закрываем подготовленное выражение
            mysqli_stmt_close($stmt);
        } else {
            echo "Ошибка подготовки запроса.";
        }
    } else {
        echo "Неверный ID.";
    }

    // Закрываем подключение к базе данных
    mysqli_close($connections);
?>
