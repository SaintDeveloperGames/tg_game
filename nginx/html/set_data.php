<?php
    include("config.php");

    // Проверяем подключение к базе данных
    if (!$connections) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }

    // Получаем значения из POST-запроса и проверяем их
    $id = $_POST['user_id'] ?? null;
    $max_score = $_POST['max_score'] ?? null;

    // Проверка корректности типов данных
    if ($id !== null && $max_score !== null) {
        // Подготовленное выражение для предотвращения SQL-инъекций
        $stmt = mysqli_prepare($connections, "UPDATE `users` SET `max_score` = ? WHERE `id` = ?");
        
        // Проверка, что подготовленное выражение создано успешно
        if ($stmt) {
            // Привязываем параметры: "ii" означает integer string
            mysqli_stmt_bind_param($stmt, "is", $max_score, $id);
            
            // Выполняем запрос
            if (mysqli_stmt_execute($stmt)) {
                echo "true"; // Запрос успешно выполнен
            } else {
                echo "Ошибка выполнения запроса: " . mysqli_stmt_error($stmt);
            }

            // Закрываем подготовленное выражение
            mysqli_stmt_close($stmt);
        } else {
            echo "Ошибка подготовки запроса.";
        }
    } else {
        echo "false"; // Некорректные данные
    }

    // Закрываем подключение к базе данных
    mysqli_close($connections);
?>
