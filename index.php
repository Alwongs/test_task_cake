<?php
    $success = !empty($_GET['success']) ? "success" : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="container">
        <section>
            <h2>Трансформирование строки по тестовому заданию</h2>
            <form action="app.php" class="form" method="POST">
                <div class="input-block">
                    <input type="text" name="phrase" value="<?php echo $_GET['phrase'] ?>" placeholder="Введите строку" required>
                </div>
                <p>
                    <span class="label">Результат:</span>
                    <span class="result">
                        <?php echo $_GET['reversed'] ?>
                    </span>
                </p>

                <div class="btn-block">
                    <input type="submit" name="submit" value="Изменить строку" />
                </div>
            </form>
        </section>

        <section>
            <h2>Тестирование</h2>
            <form  action="app.php" class="form" method="POST">
                <div class="input-block">
                    <input type="text" name="enter" value="<?php echo $_GET['enter'] ?>" placeholder="Введите строку" required>
                </div>
                <div class="input-block">
                    <input type="text" name="expected" value="<?php echo $_GET['expected'] ?>" placeholder="Введите ожидаемый результат" required>
                </div>
                <p>
                    <span class="label">Результат:</span>

                    <?php if ($success): ?>
                        <span class="result success" >
                    <?php else: ?>   
                        <span class="result " >
                    <?php endif; ?>                                                               
                        <?php echo $_GET['result'] ?>
                    </span>
                </p>
                <div class="btn-block">
                    <input type="submit" name="submit" value="Проверить" />
                </div>
            </form>
        </section>
    </div>
</body>
</html>