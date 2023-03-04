<?php


/* Getting the data from the url and decoding it into an array. */
$url = "https://jsonplaceholder.typicode.com/comments";
$data = file_get_contents($url);
$characters = json_decode($data, true);

/* Getting the value of the input field. */
$q = $_REQUEST["q"];

/* Setting the value of the variable `` to an empty string. */
$searchresult = "";


/* Checking if the input is empty. If it is, it will not run the code. */
if ($q !== "") {

  /* Converting the input to lowercase and getting the length of the input. */
  $q = strtolower($q);
  $len = strlen($q);
  /* Looping through the array and checking if the input is in the array. If it is, it will add it to
  the variable ``. */
  foreach ($characters as $character) {
    if (stristr($q, substr($character['name'], 0, $len))) {
      if ($searchresult === "") {
        $searchresult = "<li>" . $character['name'] . "</li>";
      } else {
        $searchresult .= "<li>" . $character['name'] . "</li>";
      }
    }
  }
}
/* A ternary operator. It is a shorthand way of writing an if statement. */

echo $searchresult === "" ? "no Search Result Found" : $searchresult;
