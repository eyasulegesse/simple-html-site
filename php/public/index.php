<?php
// Array with names
// $a[] = "Anna";
// $a[] = "Brittany";
// $a[] = "Cinderella";
// $a[] = "Diana";
// $a[] = "Eva";
// $a[] = "Fiona";
// $a[] = "Gunda";
// $a[] = "Hege";
// $a[] = "Inga";
// $a[] = "Johanna";
// $a[] = "Kitty";
// $a[] = "Linda";
// $a[] = "Nina";
// $a[] = "Ophelia";
// $a[] = "Petunia";
// $a[] = "Amanda";
// $a[] = "Raquel";
// $a[] = "Cindy";
// $a[] = "Doris";
// $a[] = "Eve";
// $a[] = "Evita";
// $a[] = "Sunniva";
// $a[] = "Tove";
// $a[] = "Unni";
// $a[] = "Violet";
// $a[] = "Liza";
// $a[] = "Elizabeth";
// $a[] = "Ellen";
// $a[] = "Wenche";
// $a[] = "Vicky";
$q = $_REQUEST["q"];
$url = "https://jsonplaceholder.typicode.com/comments";
$data = file_get_contents($url);
$characters = json_decode($data, true);

// get the q parameter from URL
// foreach ($characters as $character) {
//   echo $character['name'] . "+" . "\n";
// }

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len = strlen($q);
  foreach ($characters as $character) {
    if (stristr($q, substr($character['name'], 0, $len))) {
      if ($hint === "") {
        $hint = "<li>" . $character['name'] . "</li>";
      } else {
        $hint .= "<li>" . $character['name'] . "</li>";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
