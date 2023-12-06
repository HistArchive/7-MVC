<?php
if (session_id()=='') {
  session_start();
}
session_destroy();
session_unset();

//$dirPath = $_SERVER['DOCUMENT_ROOT'];
$dirPath = preg_replace('/.*\/htdocs/', '', dirname(__DIR__));
$keywords = ["Vista", "Modelo", "Controladores"];
$pattern = '/' . implode('|', array_map('preg_quote', $keywords)) . '/i';
$trimmedPath = preg_replace($pattern, '', $dirPath);

header('Location: ' . $trimmedPath);
?>