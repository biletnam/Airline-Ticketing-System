<?php 
include "db.php";
  
include("chartphp/lib/inc/chartphp_dist.php");

session_start();
$username = $_SESSION["ASusername"];
$sql = "select * from airline_staff where username = '$username'";
$result = mysqli_query($conn,$sql);
$tuple = mysqli_fetch_assoc($result);
$theName = $tuple["first_name"];
$theAirline = $tuple["airline_name"];

$query = "select month(p.purchase_date) as Month, count(p.ticket_id) as tot from ticket as t, purchases as p where t.ticket_id = p.ticket_id and airline_name = '$theAirline' group by airline_name, Month";


$p = new chartphp(); 


$result = mysqli_query($conn,$query);
$Arr = array(array());
$i = 0;
while($row = mysqli_fetch_array($result)) {
    if($row[0] == 1) $Arr[$i][0] = "Jan";
    elseif($row[0] == 2) $Arr[$i][0] = "Feb";
    elseif($row[0] == 3) $Arr[$i][0] = "Mar";
    elseif($row[0] == 4) $Arr[$i][0] = "Apr";
    elseif($row[0] == 5) $Arr[$i][0] = "May";
    elseif($row[0] == 6) $Arr[$i][0] = "Jun";
    elseif($row[0] == 7) $Arr[$i][0] = "Jul";
    elseif($row[0] == 8) $Arr[$i][0] = "Aug";
    elseif($row[0] == 9) $Arr[$i][0] = "Sep";
    elseif($row[0] == 10) $Arr[$i][0] = "Oct";
    elseif($row[0] == 11) $Arr[$i][0] = "Nov";
    elseif($row[0] == 12) $Arr[$i][0] = "Dec";
    $Arr[$i][1] = $row[1];
    $i++;
}




$p->data = array($Arr);
$p->chart_type = "bar"; 

// Common Options 
$p->title = "Bar Chart"; 
$p->xlabel = "My X Axis"; 
$p->ylabel = "My Y Axis"; 
$p->export = false; 
$p->options["legend"]["show"] = true; 
$p->series_label = array('Q1','Q2','Q3');  

$out = $p->render('c1'); 
?> 
<!DOCTYPE html> 
<html> 
    <head> 
        <script src="chartphp/lib/js/jquery.min.js"></script> 
        <script src="chartphp/lib/js/chartphp.js"></script> 
        <link rel="stylesheet" href="chartphp/lib/js/chartphp.css"> 
    </head> 
    <body> 
        <div style="width:40%; min-width:450px;"> 
            <?php echo $out;
			?> 
        </div> 
    </body> 
</html> 

select airline_name, p.purchase_date, count(p.ticket_id) as tot, extract(month from p.purchase_date) as Month from ticket as t, purchases as p where t.ticket_id = p.ticket_id group by airline_name