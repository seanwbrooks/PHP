<?php

// The following is my practice solution, which doesn't handle N > 2
function findMaxSubstring($string, $N) {
  // Initial variables
  $position = 0;
  $string = str_split($string);
  $substring = setUniqueChars($string, $position, $N);
  $max_substring = array(
    'position' => $position,
    'substring' => $substring,
    'length' => count($substring)
  );

  while (($position + $N) < count($string) && $max_substring['length'] < (count($string) / 2)) {
    if (in_array($string[$position + count($substring)], $substring)) {
      array_push($substring, $string[$position + count($substring)]);
    } else {
      if (count($substring) > $max_substring['length']) {
        $max_substring = array('substring' => $substring, 'length' => count($substring), 'position' => $position - 1);
      }
      $position += count($substring);
      $substring = setUniqueChars($string, $position, $N);
    }
  }

  return implode($max_substring['substring']) . ' (length ' . $max_substring['length'] . ') at position ' . $max_substring['position'];
}

// sets unique characters
function setUniqueChars($string, $position, $N) {
  $chars = array();
  for ($i = $position; $i < ($position + $N); $i++) {
    array_push($chars, $string[$i]);
  }
  return $chars;
}

// Display output using example input
echo findMaxSubstring("dgfddssssdsfdffdfdfadfhheedsfdfcdfdxffdh", 2);

// The best solution with O(n) implementation


$MAX_CHARS = 26;

// This function calculates number of unique characters
// using an associative array count[]. Returns true if
// no. of chars are less than required else Returns
// false.
function isValid($count, $N) {
  $val = 0;
  for ($i = 0; $i < $MAX_CHARS; $i++) {
    if ($count[$i] > 0) {
      $val++;
    }
  }
  // Returns true if k is greater than or equal to val
  return ($N >= $val)
}

// Finds the maximum substring with exactly N unique chars
function findMaxSubstring($string, $N) {
  $u = 0; // number of unique characters
  $n = count($string);

  // Associative array to store the count
  $count = [0] * $MAX_CHARS;

  // Traverse the string, fills the associative array
  // count[] and count number of unique characters
  for ($i = 0; $i < $n; $i++) {
    if ($count)
    // Pick up here...
  }
}
