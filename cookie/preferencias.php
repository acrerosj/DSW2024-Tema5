<?php
$animals = [
  'fish' => ['nemo', 'dorada', 'vieja', 'abade', 'cherne', 'medregal'],
  'insect' => ['beatle', 'ant', 'butterfly', 'fly', 'mosquito'],
  'reptil' => ['snake', 'lizard', 'tortoise', 'cocodrile']
];

// $listOfAnimals = [];
// if (empty($_GET['species'])) {
//   if (empty($_COOKIE['species'])) {
//     foreach ($animals as $name => $species) {
//       $listOfAnimals = array_merge($listOfAnimals, $species);
//     }  
//   } else {
//     $listOfAnimals = $animals[$_COOKIE['species']];  
//   }
// } else {
//   if ($_GET['species']=='all') {
//     foreach ($animals as $name => $species) {
//       $listOfAnimals = array_merge($listOfAnimals, $species);
//     }  
//     setcookie('species', '', time()-1);
//   } else {
//     $listOfAnimals = $animals[$_GET['species']];
//     setcookie('species', $_GET['species'], time() + 120);
//   }
// }

// ------------------


$species = $_GET['species'] ?? $_COOKIE['species'] ?? null;

if (($species === null) || ($species === 'all')) {
  foreach ($animals as $speciesList) {
    $listOfAnimals = array_merge($listOfAnimals, $speciesList);
  }
  if ($species==='all') {
    setcookie('species', '', time() - 1);
  }
} else {
  $listOfAnimals = $animals[$species];
  setcookie('species', $species, time() + 120);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <nav>
    <ul>
<?php
  foreach ($animals as $name => $value) {
    printf('<li><a href="preferencias.php?species=%s">%s</a></li>', $name, $name);
  }      
?>
      <li><a href="preferencias.php?species=all">Todos</a></li>      
    </ul>
  </nav>
  <ul>
<?php
  foreach($listOfAnimals as  $animal) {
    echo "<li>$animal</li>";
  }
?>
  </ul>
</body>
</html>