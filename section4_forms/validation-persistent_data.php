<!-- Persisting Form Data Across Requests -->
<?php
   $oldguess = isset($_POST['guess']) ? $_POST['guess'] : '';
?>

<p>Guessing game...</p>
<form method="post">
   <p><label for="guess">Input Guess</label>
   <input type="text" name="guess" id="guess" 
     size="40" value="<?= $oldguess ?>"/></p>
   <input type="submit"/>
</form>

<?= $oldguess ?>
<?php echo($oldguess); ?>

<!-- Validation 
	htmlentities() => transforms any input data so it can be displayed in html without interfiring with it -->
<form method="post">
  <p><label for="guess">Input Guess</label>
  <input type="text" name="guess" id="guess" 
   size="40" value="<?= htmlentities($oldguess) ?>"/></p>
   <input type="submit"/>
</form>