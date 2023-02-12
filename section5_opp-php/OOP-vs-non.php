<!-- non OOP pattern -->
<?php
$chuck = array("fullname" => "Chuck Severance", 
  'room' => '4429NQ');
$colleen = array("familyname" => "van Lent", 	
  'givenname' => 'Colleen', 'room' => '3439NQ');

function get_person_name($person) {
	if ( isset($person['fullname']) ) return $person['fullname'];
	if ( isset($person['familyname']) && isset($person['givenname']) ) {
		return $person['givenname'] . ' ' . $person['familyname'] ;
	}
	return false;
}

print get_person_name($chuck) . "\n"; // => CHuck Severance
print get_person_name($colleen) . "\n"; // => Collen vam Lent

?>

<!-- OOP pattern -->
<?php
class Person {
    public $fullname = false;
    public $givenname = false;
    public $familyname = false;
    public $room = false;
	
    function get_name() {
        if ( $this->fullname !== false ) return $this->fullname;
        if ( $this->familyname !== false && $this->givenname !== false ) {
            return $this->givenname . ' ' . $this->familyname;
        }
        return false;
    }
}

$chuck = new Person();
$chuck->fullname = "Chuck Severance";
$chuck->room = "4429NQ";

$colleen = new Person();
$colleen->familyname = 'van Lent'; 
$colleen->givenname = 'Colleen';
$colleen->room = '3439NQ';

print $chuck->get_name() . "\n"; // => CHuck Severance
print $colleen->get_name() . "\n"; // => Collen vam Lent
?>