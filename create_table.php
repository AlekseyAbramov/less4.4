<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'connect.php';
        $sql_create = 'CREATE TABLE IF NOT EXISTS `autos` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(30) NOT NULL,
                `price` int(11) NOT NULL,
                `test` varchar(30) NOT NULL,
                `run` int(11) NULL,
                PRIMARY KEY (`id`)
                ) Engine=InnoDB DEFAULT CHARSET=utf8;';
        if ($db->query($sql_create)) {
         echo 'Таблица создана <br>';
        } else {
         echo 'Таблица не создана <br>';
        }
        ?>
        <p><a href="index.php">Главная страница</a></p>
        <p><a href="list_table.php">Просмотреть все таблицы в базе данных</a></p>
    </body>
</html>


