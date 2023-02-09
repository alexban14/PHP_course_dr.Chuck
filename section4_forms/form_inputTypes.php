Select your favorite color: 
<input type="color" name="favcolor" value="#0000ff"><br/>
Birthday: 
<input type="date" name="bday" value="2013-09-02"><br/>
E-mail: 
<input type="email" name="email"><br/>
Quantity (between 1 and 5): 
<input type="number" name="quantity" 
   min="1" max="5"><br/>
Add your homepage: 
<input type="url" name="homepage"><br>
Transportation: 
<input type="flying" name="saucer"><br>

<!-- Validation happens after you submit the form -->

<p>$_POST: </p>
<pre>
<?php
	print_r($_POST);
?>
<pre>