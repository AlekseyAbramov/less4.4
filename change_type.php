<?php

include_once 'connect.php';
var_dump($_POST);
if(!empty($_POST)){
    $type = explode("_", $_POST["type"]);
    var_dump($type);
    $sql_ch_type = 'ALTER TABLE '. $type[1]. ' MODIFY '. $type[3]. ' '.$type[6];
    if($type[5] == 'NO') {
        $sql_ch_type = $sql_ch_type. ' NOT NULL';
    } else {
        $sql_ch_type = $sql_ch_type. ' NULL';
    }
    var_dump($sql_ch_type);
    $sth = $db->prepare($sql_ch_type);
    $sth->execute(array($sql_ch_type));
    header('Location:edit_table.php?name='. $type[1]);
} else {
    header('Location:index.php');
}

