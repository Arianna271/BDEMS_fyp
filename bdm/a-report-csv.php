<?PHP
session_start();

include("database.php");
if( !verifyAdmin($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?php
$eventID	= (isset($_GET['eventID'])) ? trim($_GET['eventID']) : '';

if($eventID =="") exit;

$SQL_list = "SELECT * FROM `donoreventhistory`,`donor` WHERE donoreventhistory.donorID = donor.donorID AND `eventID` = '$eventID'";

$Result = mysqli_query($con, $SQL_list) ;
?>
<?php
//fetching each row as an array and placing it into a holder array ($aData)
while($row = mysqli_fetch_assoc($Result)){
 $aData[] = $row;
}
//feed the final array to our formatting function...
$contents = getExcelData($aData);

$filename = "Donor-Report.xls";

//prepare to give the user a Save/Open dialog...
header ("Content-type: application/octet-stream");
header ("Content-Disposition: attachment; filename=".$filename);

//setting the cache expiration to 30 seconds ahead of current time. an IE 8 issue when opening the data directly in the browser without first saving it to a file
$expiredate = time() + 30;
$expireheader = "Expires: ".gmdate("D, d M Y G:i:s",$expiredate)." GMT";
header ($expireheader);

//output the contents
echo "Donor Report\n\n";   //Ini adalah tajuk di atas jika perlu
echo $contents;
exit;
?>

<?php
 function getExcelData($data){
    $retval = "";
    if (is_array($data)  && !empty($data))
    {
     $row = 0;
     foreach(array_values($data) as $_data){
      if (is_array($_data) && !empty($_data))
      {
          if ($row == 0)
          {
              // write the column headers
              $retval = implode("\t",array_keys($_data));
              $retval .= "\n";
          }
           //create a line of values for this row...
              $retval .= implode("\t",array_values($_data));
              $retval .= "\n";
              //increment the row so we don't create headers all over again
              $row++;
       }
     }
    }
  return $retval;
 }
?>