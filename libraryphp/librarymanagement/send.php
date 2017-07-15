<?php
//Checking http request we are using post here 
if($_SERVER['REQUEST_METHOD']=='POST'){
 
 //Getting api key 
 $api_key = $_POST['apikey']; 
 
 //Getting registration token we have to make it as array 
 $reg_token = array($_POST['regtoken']);
 
 //Getting the message 
 $message = $_POST['message'];
 
 //Creating a message array 
 $msg = array
 (
 'message' => $message,
 'title' => 'Message from Simplified Coding',
 'subtitle' => 'Android Push Notification using GCM Demo',
 'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
 'vibrate' => 1,
 'sound' => 1,
 'largeIcon' => 'large_icon',
 'smallIcon' => 'small_icon'
 );
 
 //Creating a new array fileds and adding the msg array and registration token array here 
 $fields = array
 (
 'registration_ids' => $reg_token,
 'data' => $msg
 );
 
 //Adding the api key in one more array header 
 $headers = array
 (
 'Authorization: key=' . $api_key,
 'Content-Type: application/json'
 ); 
 
 //Using curl to perform http request 
 $ch = curl_init();
 curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
 curl_setopt( $ch,CURLOPT_POST, true );
 curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
 curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
 curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
 curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
 
 //Getting the result 
 $result = curl_exec($ch );
 curl_close( $ch );
 
 //Decoding json from result 
 $res = json_decode($result);
 
 
 //Getting value from success 
 $flag = $res->success;
 
 //if success is 1 means message is sent 
 if($flag == 1){
 //Redirecting back to our form with a request success 
 header('Location: index.php?success');
 }else{
 //Redirecting back to our form with a request failure 
 header('Location: index.php?failure');
 }
}
?>