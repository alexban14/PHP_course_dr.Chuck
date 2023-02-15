<?php
  // Note - cannot have any output before this
session_start(); // => creates a session or resumes the current one
//based on a session identifier passed via a GET or POST request, or passed via a cookie. 

  if ( ! isset($_SESSION['pizza']) ) {
     echo("<p>Session is empty</p>\n");
     $_SESSION['pizza'] = 0;
} else if ( $_SESSION['pizza'] < 3 ) {
     $_SESSION['pizza'] = $_SESSION['pizza'] + 1;
     echo("<p>Added one...</p>\n");
  } else {
    session_destroy(); // => destroys all of the data associated with the current session.
	//It does not unset any of the global variables associated with the session,
	//or unset the session cookie.
    session_start();
    echo("<p>Session Restarted</p>\n");
  }
?>
<p><a href="sessfun.php">Click Me!</a></p>
<p>Our Session ID is: <?php echo(session_id()); ?></p>
<pre>
<?php print_r($_SESSION); ?>
</pre>