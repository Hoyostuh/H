<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Диапазон дат</title>
</head>
<body>
    <h1>Выберите диапазон дат</h1>
    <form method="POST">
        <label for="date1">Дата 1:</label>
        <input type="date" id="date1" name="date1" required>
        <br><br>
        <label for="date2">Дата 2:</label>
        <input type="date" id="date2" name="date2" required>
        <br><br>
        <button type="submit">Показать диапазон</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        if ($date1 > $date2) {
            echo "<p style='color:red;'>Ошибка: Дата 2 не должна быть ранее Даты 1.</p>";
        } else {
            $period = new DatePeriod(
                new DateTime($date1),
                new DateInterval('P1D'),
                (new DateTime($date2))->modify('+1 day')
            );
            $dates = [];
            foreach ($period as $date) {
                $dates[] = $date->format('Y-m-d');
            }
            echo "<h2>Массив дней:</h2>";
            echo "<pre>";
            print_r($dates);
            echo "</pre>";
        }
    }
    ?>
</body>
</html>
