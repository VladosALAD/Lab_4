<?php

if (!isset($_POST['adCategory'], $_POST['adTitle'], $_POST['adEmail'], $_POST['adText'])) {
    return;
}
$categoryName = $_POST['adCategory'];
$title = $_POST['adTitle'];
$email = $_POST['adEmail'];
$text = $_POST['adText'];

$adFile = fopen('categories/' . $categoryName . '/' . $title . '.txt', 'w');
fwrite($adFile, $email . "\n");
fwrite($adFile, $text);
fclose($adFile);

header("Location: Site.php");