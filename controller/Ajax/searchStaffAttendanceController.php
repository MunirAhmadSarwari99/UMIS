<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
//$query = mysqli_query($DBCONNECTION,"SELECT * FROM users WHERE email LIKE '%" .$_POST['search']. "%' OR  firstName LIKE '%" .$_POST['search']. "%' OR  lastName LIKE '%" .$_POST['search']. "%'");

$query = mysqli_query($DBCONNECTION,"
SELECT staffsalary.id, staffsalary.amount, staffsalary.salaryDate, staffsalary.bonus, staffsalary.Absences, staffsalary.pay, staff.firstName, staff.lastName
 FROM staffsalary
 INNER JOIN staff ON staff.id = staffsalary.staffid
 WHERE staffsalary.amount LIKE '%" .$_POST['search']. "%' OR staffsalary.salaryDate LIKE '%" .$_POST['search']. "%' OR staffsalary.bonus LIKE '%" .$_POST['search']. "%' OR staffsalary.Absences LIKE '%" .$_POST['search']. "%' OR staffsalary.pay LIKE '%" .$_POST['search']. "%' OR staff.firstName LIKE '%" .$_POST['search']. "%' OR staff.lastName LIKE '%" .$_POST['search']. "%'");
$output = '';
$pay = null;
if (mysqli_num_rows($query) > 0){
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['pay'] == 1) {$pay = 'Yes &nbsp; <small class="md md-verified-user"></small>';}
        else {$pay = 'No &nbsp; <small class="md md-cancel" style="color: red;"></small>';}

        $output .='<tr>';
        $output .='<td>'. $row['firstName'] .'</td>';
        $output .='<td>'. $row['lastName'] .'</td>';
        $output .='<td>'. $row['amount'] .'</td>';
        $output .='<td>'. $row['salaryDate'] .'</td>';
        $output .='<td>'. $row['bonus'] .'</td>';
        $output .='<td>'. $row['Absences'] . "Day" .'</td>';
        $amount = $row["amount"];
        $bonus = $row["bonus"];
        $absences = $row["Absences"];
        $total = null;
        if ($row["bonus"] != 0 ){
            $value = $amount + $bonus;
            if ($absences != 0){
                $val = $absences * 20;
                $total = $value - $val;
            }else if($row["bonus"] != 0 ){
                $total = $amount + $bonus;
            }
        }else{
            $total =$amount;
        }
        $output .='<td><strong class="text-lg text-accent">'.$total.'</strong></td>';
        $output .='<td>'. $pay .'</td>';
        $output .='<td class="setting text-right"><a href="../views/userdetails.php?id='.$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show Row Details"><i class="fa fa-eye"></i></a><a href="../controller/deleteUserController.php?id=' .$row["id"].'" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete Row"><i class="fa fa-trash-o"></i></a></td>';
        $output .='</tr>';
    }
    echo $output;
}else{
    echo '<tr><td align="center" colspan="7">No Data Found</td></tr>';
}