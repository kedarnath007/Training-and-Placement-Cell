<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		$username = $_SESSION['placement_username'];
		include 'config.php';
$download = $_GET['download'];
$filename = "details"; 

$result = mysql_query($download);    
$file_ending = "xls";
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t"; 
for ($i = 0; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
print("\n");    
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    } 
	}else {
header('location:login.php');
}
}else {
header('location:login.php');
}
?>