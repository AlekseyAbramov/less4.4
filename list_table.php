<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'connect.php';
        $sql_list ='SHOW TABLES';
        $list = $db->query($sql_list);
        while ($row = $list->fetch(PDO::FETCH_NUM)) {
            echo '<a href="edit_table.php?name='. $row['0']. '">Таблица "'. $row['0']. '"</a><br>';
        }
        ?>
    </body>
</html>
