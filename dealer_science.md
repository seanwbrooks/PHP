# DealerScience Code Assessment
⋅⋅⋅Given any random string &quot;dgfddsssdsfdffdfdfadfhheedsfdfcdfdxffdh&quot; and N as a number of unique characters an input parameter, find the longest substring made entirely of N unique characters. These characters may be repeated an unlimited number of times, but must be adjacent to each other in the string without any other characters between them. Output the longest substring and its starting position in the given string. If n=2 output &quot;fdffdfdf&quot; starts at position 10.

### Input: 
1. string of characters (String)
2. number of unique characters (Integer)

### Output:
Longest string - starting position

#### Example:
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -
1. dgfddsssdsfdffdfdfadfhheedsfdfcdfdxffdh
2. N = 2

#### Substrings:
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -
dg (length 2)
gf (length 2)
fdd (length 3)
ddsssds (length 7)
fdffdfdf (length 8) - max
