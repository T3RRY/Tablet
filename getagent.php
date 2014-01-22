<?php

error_reporting(0); // turns off error reporting

$con = mysql_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("hcs", $con);

 mysql_select_db("hcs");

 $param=$_GET['param']; 

if (strlen($param) > 0) {
    $result = mysql_query("SELECT * FROM resident 
     WHERE residentID LIKE '$param%'");
    if (mysql_num_rows($result) == 1) {
        while ($myrow = mysql_fetch_array($result)) {
            $agentforename = $myrow["forename"];
            $agentSurname = $myrow["Surname"];
            $agentknownas = $myrow["knownas"];
            $agentage = $myrow["age"];
			$agentDOB = $myrow["DOB"];
			$agentadmissiondate = $myrow["admissiondate"];
			$agentheight = $myrow["height"];			
            $textout .= $agentforename . ", " . $agentSurname . ", " . $agentknownas . ", " . $agentage . ", " . $agentDOB 
			. ", " . $agentadmissiondate . ", " . $agentheight; 
		}
    } else {
        $textout = " , , ," . $param;
    }
}
echo $textout;
?>