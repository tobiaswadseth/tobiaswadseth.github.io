<?php
function slug($text) {
  // Byt alla karaktärer som inte är bokstäver eller siffror mot -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // Trimma
  $text = trim($text, '-');

  // Konvertera kodning
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // Lowercase
  $text = strtolower($text);

  // Ta bort oönskade (specialkaraktärer) karaktärer
  $text = preg_replace('~[^-\w]+~', '', $text);
  if (empty($text))
  {
    return 'n-a';
  }
  return $text;
}
?>