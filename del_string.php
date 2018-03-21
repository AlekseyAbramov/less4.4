<?php

include_once 'connect.php';
if (!empty($_GET)) {
    var_dump($_GET);
    $sql_del = 'ALTER TABLE `'. $_GET['name']. '` DROP COLUMN `'. $_GET['id']. '`';
    $sth = $db->prepare($sql_del);
    $sth->execute(array($sql_del));
    header('Location:edit_table.php?name='. $_GET['name']);
} else {
    header('Location:index.php');
}

