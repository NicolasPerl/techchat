<?php
    // get the incoming information
    extract($_POST);
    $email = $_POST["emails"];
    //$time = date.timezone("r");
    // open file and append name
    /*
    if ($fh = fopen ("./emails", "a"));
    {
        fwrite($fh, "$email\n");
        fclose($fh);
    }
    */

    $fh = fopen ("./emails", "a");
    fwrite($fh, "$email\n")
    
   print <<< THANKS

   <html>
     <head>
       <title> Thank you </title>
     </head>
     <body>
       <h2> Thank you for registering! To go back home <a href="./index.php">follow me</a></h2>
     </body>
   </html>

THANKS;
?>