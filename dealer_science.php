<?php

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
    if (in_array($string[($position + count($substring))], $substring)) {
      array_push($substring, $string[($position + count($substring))]);
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

// Print our results with example input within findMaxSubstring (our function call)
echo findMaxSubstring("dgfddssssdsfdffdfdfadfhheedsfdfcdfdxffdh", 2);
