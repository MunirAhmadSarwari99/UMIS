<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT * FROM users WHERE email LIKE '%" .$_POST['search']. "%' OR  firstName LIKE '%" .$_POST['search']. "%' OR  lastName LIKE '%" .$_POST['search']. "%'");

$output = '';
$level = '';
$statue = '';
$img = '';
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['level'] == 0) {$level = 'Administrator';}
        elseif ($row['level'] == 1) {$level = 'Staff';}
        elseif ($row['level'] == 2) {$level = 'Teacher';}
        elseif ($row['level'] == 3) {$level = 'Student';}

        if ($row['statue'] == 1) {$statue = 'Active';}
        else {$statue = 'Deactivate';}

        if ($row['photo'] == 'default.png'){$img = '../public/images/'.$row['photo'];}
        else{$img = '../public/Storage/Users/'.$row['photo'];}
        $output .='<tr>';
        $output .='<td><img class="img-circle width-1" src="'.$img.'" alt="" /></td>';
        $output .='<td>'. $row['firstName'] .'</td>';
        $output .='<td>'. $row['lastName'] .'</td>';
        $output .='<td>'. $row['email'] .'</td>';
        $output .='<td>'. $level .'</td>';
        $output .='<td>'. $statue .'</td>';
        $output .='<td class="setting text-right"><a href="../views/userdetails.php?id='.$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show Row Details"><i class="fa fa-eye"></i></a><a href="../controller/deleteUserController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}