<!-- Integer indices -->
<?php
	$stuff = array("Hi", "There");
	echo $stuff[1], "\n";
?>

<!-- Key / Value arrays -->
<?php
	// the key "name" maps to the value "Ban"
	$stuff = array("name" => "Ban",
					"occupation" => "Web Developer");
	echo $stuff["course"], "\n";
?>

<!-- Dumping an array -->
<?php
	$stuff = array("name" => "Ban",
					"occupation" => "Web Developer");
	// <pre> is a tag that respects new lines>
	echo ("<pre>\n");
	print_r($something);
	// shows the raw php data
	echo("\n</pre>\n");

	// var_dump() => a more verbose way of "dumping an array" (prints out false)

	// push stuff to the array
	$va = array();
	$va = "Hello";
	$va = "World";
	// this will index the items push to the array

	$arr = array();
	$arr["name"] =  "Ban";
	// this pushes items as key / value pairs
?>

<!-- looping thru an array -->
<?php
	$stuff = array("name" => "Ban",
							"occupation" => "Web Developer");
	foreach($stuff as $k => $v) {
		echo "Key = ", $k, " Val = ", $v, "\n";
	}
	// for an indexed array its the same,
	// but the index becomes the key
?>

<!-- Counted loops -->
<?php
	$stuff = array("Alex", "Dan");
	for ($i = 0; $i < count($stuff); $i ++) {
		echo "I = ", $i, " Val = ", $stuff[$i], "\n";
	}
	//  !! this wont work for array that have empty places inside
?>

<!-- You can construct an array of arrays -->
<?php
	$products = array(
		'paper' =>	array( 
			'copier' => "Copier & Multipurpose", 
			'inkjet' => "Inkjet Printer", 
			'laser' => "Laser Printer", 
			'photo' => "Photographic Paper"),
		'pens' => array(
			'ball'	=> "Ball Point", 
			'hilite' => "Highlighters", 
			'marker' => "Markers"),
		'misc' => array( 
			'tape'	=> "Sticky Tape", 
			'glue'	=> "Adhesives", 
			'clips' => "Paperclips") 
	);
?>


<!-- Array functions -->