<?php

// The following is my practice solution, which doesn't handle N > 2
function findMaxSubstringPractice($string, $N) {
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

  return implode($max_substring['substring']) . ' (length ' . $max_substring['length'] . ') at position ' . $max_substring['position'] . "\n";
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
echo findMaxSubstringPractice("dgfddssssdsfdffdfdfadfhheedsfdfcdfdxffdh", 2);



// The best solution with O(n) implementation

$max_chars = 26;

// This function calculates number of unique characters
// using an associative array count[]. Returns true if
// no. of chars are less than required else Returns
// false.
function isValid($count, $N) {
  $val = 0;
  for ($i = 0; $i < $GLOBALS['max_chars']; $i++) {
    if ($count[$i] > 0) {
      $val++;
    }
  }
  // Returns true if $N is greater than or equal to $val
  return ($N >= $val);
}

// Finds the maximum substring with exactly N unique chars
function findMaxSubstring($string, $N) {
  $uniqChars = 0; // number of unique characters
  $string_len = count($string);

  // Associative array to store the count
  $count = array_fill(0, $GLOBALS['max_chars'], 0);

  var_dump(array('count_array' => $count, 'max_chars' => $GLOBALS['max_chars']));

  // Traverse the string, fills the associative array
  // count[] and count number of unique characters
  for ($i = 0; $i < $string_len; $i++) {
    if ($count[$string[$i] - 'a'] == 0) {
      $u++;
      $count[$string[$i] - 'a']++;
    }
  }

  // If there are not enough unique characters, show an error message
  if ($u < $k) {
    return "Not enough unique characters";
  }

  // Otherwise take a window with first element in it.
  // Start and end variables.
  $cur_start = $cur_end = 0;

  // Also initialize values for result longest window
  $max_window_size = 1;
  $max_window_start = 0;

  // Initialize associative array count[] with zero
  $count = array_fill(0, $GLOBALS['max_chars'], 0);

  $count[$string[0] - 'a']++; // put the first character

  // Start from the second character and add characters in window according
  // to above explanation.
  for ($i = 1; $i < $string_len; $i++) {
    // Add the character '$string[$i]' to current window
    $count[$string[$i] - 'a']++;
    $cur_end++;

    // If there are more than N unique characters in current window, remove
    // from left side
    while (!isValid($count, $N)) {
      $count[$string[$cur_start] - 'a']--;
      $cur_start++;
    }

    // Update the max window size if required
    if ($cur_end - $cur_start + 1 > $max_window_size) {
      $max_window_size = $cur_end - $cur_start + 1;
      $max_window_start = $cur_start;
    }
  }

  return "Max substring is: " . $string.substr($max_window_start, $max_window_size) .
    " with length " . $max_window_size;
}

// Call function for results
echo findMaxSubstring("aabacbebebe", 3);
