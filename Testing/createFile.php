<?php
$myfile = fopen("testfile.txt", "w") or die("Unable to open file!");
$text = "Hello, world!\n";
fwrite($myfile, $text);
fclose($myfile);