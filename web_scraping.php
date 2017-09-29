<?php
include 'curl.php';
include 'scrape_between.php';

$scraped_website = curl("https://finance.yahoo.com/quote/ACBFF?p=ACBFF");
echo $scraped_website;

?>
