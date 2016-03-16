
    <?php  
    session_start();//session is a way to store information (in variables) to be used across multiple pages.  
   

   //unset($_SESSION["user_id"]); 
   session_unset();
   
// Finally, destroy the session.
  session_destroy();
     
 header("Location: index.html");//use for the redirection to some page  
    ?>  