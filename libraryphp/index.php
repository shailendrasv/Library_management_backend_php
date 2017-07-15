<html>
 <head>
 <title>Android Push Notification using GCM</title>
 </head>
 
 <body>
 
 <h1>Android Push Notification using GCM</h1>
 
 <form method='post' action='send.php'>
 
 <input type='text' name='apikey' placeholder='Enter API Key' />
 <input type='text' name='regtoken' placeholder='Enter Device Registration Token' />
 <textarea name='message' placeholder='Enter a message'></textarea>
 
 <button>Send Notification</button>
 </form>
 <p>
 
 <?php
 //if success request came displaying success message 
 if(isset($_REQUEST['success'])){
 echo "<strong>Cool!</strong> Message sent successfully check your device...";
 }
 //if failure request came displaying failure message 
 if(isset($_REQUEST['failure'])){
 echo "<strong>Oops!</strong> Could not send message check API Key and Token...";
 }
 ?>
 </p>
 <div>Total Views <br /><span><?php echo $count; ?></span></div>
 
 <footer>
 Copyright 2016 &copy; All Rights Reserved to <b> Shailendra Singh</b>
 </footer> <h3> :P </h3>
 </body>
 
</html>