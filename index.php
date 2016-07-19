<?php
//array u koju će se postaviti parametri iz url-a: index.php, klasa i funkcija koja treba biti pozvana
$urlArray = array();

//Stavljanje url-a u string te potom u array na način da se string rastavi između "/"
$fullUrl = $_SERVER['REQUEST_URI'];
$urlArray = array_filter(explode("/", $fullUrl));

//Pronalaženje gdje je u array-u index.php kako bi se sve prije njega izbacilo iz arraya, a on bio na "0" poziciji u array-u
$i = 0;
foreach($urlArray as $part){
	if ($part == "index.php"){
		break;
		}
		$i++;		
	}
array_splice($urlArray, 0, $i);

$paramNum = count($urlArray);

//prvi "if" gleda jel smo na homepage ili je u url-u i klasa s obzirom na to koliko elementata ima u $urlArray
if($paramNum > 1){
	//ovdje se gleda koja je to klasa u pitanju ($urlArray[1]), ako je nepostojeća ispisuje se greška
	//ovisno koja klasa je u pitanju, stvara se objekt $class kao instanca classOne ili classTwo
	if ($urlArray[1] == "classOne"){
		include 'classOne.php';
		$class = new classOne();
	}
	elseif ($urlArray[1] == "classTwo"){
		include 'classTwo.php';
		$class = new classTwo();
	}
	else {
		echo "Invalid URL";
		exit();
	}
	
	//ovdje se sa "if" gleda jel dodan još jedan parametar tj. poziv na funkciju	
	if($paramNum > 2){
		/*poziva se funkcija na objekt $class s obzirom koja funkcija je u pitanju, tj. koji parametar je ubačen u $urlArray[2], 
		ako je nepostojeća ispisuje se greška*/
		if($urlArray[2] == "fOne"){
			$class->fOne();
		}
		elseif($urlArray[2] == "fTwo"){
			$class->fTwo();
		}
		else {
			echo "Invalid URL";
			exit();
		}
	}
	//ukoliko nema parametra za funkciju, ispisuje se samo naziv klase
	else {
		echo "Class name: " . get_class($class);
	}
}
else {
	echo "Homepage";
}
?>