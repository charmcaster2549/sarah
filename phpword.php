<?php

require_once 'MIT/PHPWord/Autoloader.php';

use PhpOffice\PhpWord\PhpWord;

$phpWord = new PhpWord();
$section = $phpWord->addSection();
$section->addText('Hello, PHPWord!');

$phpWord->save('sample.docx');