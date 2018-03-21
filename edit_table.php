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
        <style>
            table { 
                border-spacing: 0;
                border-collapse: collapse;
            }

            table td, table th {
                border: 1px solid #ccc;
                padding: 5px;
            }

            table th {
                background: #eee;
            }
            
            form {
                margin-bottom: 10px;
            }
        </style>
        <table>
            <th>Field</th>
            <th>Type</th>
            <th>Null</th>
            <th>Key</th>
            <th>Default</th>
            <th>Extra</th>
            <th>Delete</th>
            <th>Change Field</th>
            <th>Change Type</th>
        <?php
        include_once 'connect.php';
        if (!empty($_GET)) {
            $name = $_GET['name'];
            $sth = $db->prepare('DESCRIBE '. $name);
            $sth->execute(array($name));
            foreach ($sth->fetchAll(PDO::FETCH_ASSOC) as $value){
                echo '<tr><td>'. $value['Field']. '</td>';
                echo '<td>'. $value['Type'] . '</td>';
                echo '<td>'. $value['Null'] . '</td>';
                echo '<td>'. $value['Key'] . '</td>';
                echo '<td>'. $value['Default'] . '</td>';
                echo '<td>'. $value['Extra'] . '</td>';
                echo '<td><a href="del_string.php?id='. $value['Field']. '&name='. $name. '">Удалить</a></td>';
                echo '<td><a href="change_string.php?field='. $value['Field']. '&type='. $value['Type']. '&null='. $value['Null']. '&default='. $value['Default']. '&extra='. $value['Extra']. '&name='. $name. '">Изменить имя</a></td>';
                echo '<td><form method="POST" action="change_type.php"><select name="type"><option value="name_'. $name. '_field_'.$value['Field']. '_null_'. $value['Null']. '_varchar(50)">varchar(50)</option>'.
                                                                                          '<option value="name_'. $name. '_field_'.$value['Field']. '_null_'. $value['Null']. '_tinyint(4)">tinyint(4)</option>'.                                   
                                                                                          '<option value="name_'. $name. '_field_'.$value['Field']. '_null_'. $value['Null']. '_text">text</option></select><input type="submit" name="assign" value="Изменить тип" /></form></td></tr>';
            }
        } else {
            header("Location:list_table.php");
        }
        ?>
        </table>
    </body>
</html>
