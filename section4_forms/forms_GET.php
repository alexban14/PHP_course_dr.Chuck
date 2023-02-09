<!-- PHP processes the incoming HTTP request based on the protocol specifications
	and drops the data into various super global variables (usually arrays) -->

<p>Guessing game...</p>
<form>
   <p><label for="guess">Input Guess</label>
   <input type="text" name="guess" id="guess"/></p>
   <input type="submit"/>
</form>
<pre>
$_GET:
<?php
   print_r($_GET);
?>
</pre>