<!DOCTYPE html>
<html>
<body>

<?php
echo "Nabil's first PHP script! <br>";
$age = 20;
echo "<h1> Nabil Ahmed is $age year's old </h2>";

$theA = array(5,10,15,20);
echo $theA[0]+$theA[1]+$theA[2]+$theA[3];
echo "<br>";

class Person {
	function Person() {
		$this->name = "Nabil";
		$this->age = 20;
	}
}

$Nab = new Person();
echo "My name is $Nab->name and I am $Nab->age year's old <br>";

$lol = array("Nibs" => 12, "Jims" => 13);
foreach($lol as $x => $y) {
	echo "Key = $x and Value = $y <br>";
}

?>

</body>
</html>