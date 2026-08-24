<?php

require_once 'index.php';

use protfolio\Book;

$lol = new Book();
$lol->setRating(-1);
print $lol->getRating();
