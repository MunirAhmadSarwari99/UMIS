<?php
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);

    $user = mysqli_query($DBCONNECTION,"SELECT level FROM users WHERE id=".$_GET['id']);
    $row = mysqli_fetch_assoc($user);

    if ($row['level'] == 0 || $row['level'] == 1){
        $query = mysqli_query($DBCONNECTION,"
SELECT users.id, users.firstName, users.lastName, users.email, users.level, users.photo, users.statue, roles.admin, roles.hr, roles.finance, roles.logistic, permissions.create1, permissions.reed1, permissions.edit1, permissions.delete1
 FROM ((users
 INNER JOIN roles ON roles.userid = users.id)
 INNER JOIN permissions ON permissions.userid = users.id) 
 WHERE users.id =". $_GET['id']);
        $result = mysqli_fetch_assoc($query);
    }else{
        $query = mysqli_query($DBCONNECTION,"
SELECT users.id, users.firstName, users.lastName, users.email, users.level, users.photo, users.statue, permissions.create1, permissions.reed1, permissions.edit1, permissions.delete1
 FROM ((users
  INNER JOIN permissions ON permissions.userid = users.id ))
 WHERE users.id=". $_GET['id']);
        $result = mysqli_fetch_assoc($query);
    }
}