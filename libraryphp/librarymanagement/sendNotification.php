<?php
include("PDOConnection.php");
define('GOOGLE_API_KEY', 'AIzaSyCtn4RDFOjAZZm3KhyVvXgL2oA9W_RamMc');//Replace with your Key

$pushStatus = '0';;

if(isset($_POST['submit'])) {
 $gcmRegIds = array();
    $sql = "SELECT tokenid FROM deviceinfo";
    $result = $cnn->query($sql);
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  array_push($gcmRegIds, $row["tokenid"]);
 }
    $pushMessage = $_POST['message'];
    if(isset($gcmRegIds) && isset($pushMessage)) {
        $message = array('message' => $pushMessage);
        $pushStatus = sendPushNotification($gcmRegIds, $message);
    }   
}

function sendPushNotification($registration_ids, $message) {
            // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
  $fields = array(
            'registration_ids' => $registration_ids,
            'data' => $message,
        );
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
  return $result;
}


?>
<html>
    <head>
        <title>GCM Server</title>
    </head>
    <body style="text-align:center;color:white">
 <div style="background-color:#F2425A;height:100px;padding-top:15ppx;padding-bottom:15px;width:100%">
 <h2>Library App</h2>
   <h3>Google Cloud Messaging (GCM) Server</h3>
   </div>
    <form method = 'POST' action = ''>
        <div style="padding-top:10px">
            <textarea rows = 6 name = "message" cols = 50 placeholder = 'Messages send to all device in database via GCM'></textarea>
        </div>
        <div style="margin-top:10px" >
            <input type = 'submit' name="submit" value = 'Send Notification' style="background-color:#F2425A;color:#fff;padding:5px 5px 5px 5px;border:none">
        </div>
        <p>
   <h3>
   <?php
    if('0' != $pushStatus)
    {
     $obj = json_decode($pushStatus);
     if($obj != null)
     {
      echo("<div style='color:green'>");
      echo("<p style='color:red'>Status:</p>");
      echo("Success:".$obj->success);
      echo("&nbsp;&nbspFailure:".$obj->failure);
      echo("</div>");
     }
     else
     {
      echo("<div style='color:red'>".$pushStatus."</div>");
     } }
   ?>
   </h3>
  </p>
    </form>
    </body>
</html>
