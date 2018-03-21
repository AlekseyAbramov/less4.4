<form method="POST">
    <input type="text" name="new_field" placeholder="Новое название" value="" />
    <input type="submit" name="change" value="Изменить" />
</form>
<?php

include_once 'connect.php';
if (!empty($_GET)) {
    if(!empty($_POST)) {
        $sql_ch = 'ALTER TABLE `'. $_GET['name']. '` CHANGE `'. $_GET['field']. '` `'. $_POST['new_field']. '` '. $_GET['type']. ' ';
       if($_GET['null'] == 'NO') {
           $sql_ch = $sql_ch. 'NOT NULL';
       } else {
           $sql_ch = $sql_ch. 'NULL';
       }
       if($_GET['default']) {
           $sql_ch = $sql_ch. ' DEFAULT '. $_GET['default'];
       }
      if($_GET['extra']) {
           $sql_ch = $sql_ch. ' AUTO_INCREMENT';
       }
       $sth = $db->prepare($sql_ch);
       $sth->execute(array($sql_ch));
       header('Location:edit_table.php?name='. $_GET['name']);
    }
    
    //$sth = $db->prepare($sql_ch);
    //$sth->execute(array($sql_ch));
   // header('Location:edit_table.php?name='. $_GET['name']);
} else {
    header('Location:index.php');
}