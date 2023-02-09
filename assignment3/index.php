<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ban Alexandru MD5 Cracker</title>
</head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash of a 4 digit pin and checks all 10,000 possible four digit PINs to determine the PIN.</p>

<pre>
Debug Output:
<?php
$passFound = "Not found";
if ( isset($_GET['md5']) == 'true' ) {
	$time_pre = microtime(true);
	$md5 = $_GET['md5'];
	$triesCount = 0;
	$totalChecks = 0;

	$allNumbers = '0123456789'; //abcdefghijklmnopqrstuvwxyz

	for ( $i = 0; $i < strlen($allNumbers); $i++) {
		$char1 = $allNumbers[$i];

		for ( $j = 0; $j < strlen($allNumbers); $j++) {
			$char2 = $allNumbers[$j];

			for ( $k = 0; $k < strlen($allNumbers); $k++) {
				$char3 = $allNumbers[$k];

				for ( $l = 0; $l < strlen($allNumbers); $l++) {
					$char4 = $allNumbers[$l];

					$passTry = $char1.$char2.$char3.$char4;
					$check = hash('md5', $passTry);

					$totalChecks = $totalChecks + 1;

					if ( $check == $md5) {
						$passFound = $passTry;
						break;
					}

					if ( $triesCount < 15 ) {
						print "$check  $passTry\n";
						$triesCount = $triesCount + 1;
					}
				}
			}
		}
	}
	$time_post = microtime(true);
	$computationTime = $time_post - $time_pre;
	print "Total checks: $totalChecks\n";
	print "Ellapsed time: $computationTime\n";
}
?>
</pre>

<p>PIN: <?= htmlentities($passFound) ?></p>
<form>
	<input type="text" name="md5" size="60" />
	<input type="submit" value="Crack MD5" />
</form>

<ul>
	<li><a href="index.php">Reset</a></li>
</ul>

</body>
</html>