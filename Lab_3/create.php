<?php

namespace crt;
// Создание списка названий категорий и заготовки для ассоциативного массива $adsDict с объявлениями
$categoriesDir = opendir('categories');
$categoriesNameList = [];
$adsDict = [];  // Ключ — название категории, значение — массив троек элементов: [название, email, текст]
while ($categoryName = readdir($categoriesDir)) {
    if (is_dir('categories/' . $categoryName) && $categoryName != '.' && $categoryName != '..') {
        $categoriesNameList[] = $categoryName;
        $adsDict[$categoryName] = [];
    }
}

// Добавление объявлений из файлов в ассоциативный массив $adsDict
foreach ($categoriesNameList as $categoryName) {
    $categoryDir = opendir('categories/' . $categoryName);
    while ($fileName = readdir($categoryDir)) {
        if ($fileName != '.' && $fileName != '..') {
            $filePathName = 'categories/' . $categoryName . '/' . $fileName;
            $file = fopen($filePathName, 'r');
            $title = substr($fileName, 0, strlen($fileName) - 4);
            $email = fgets($file);
            $text = "";
            while (!feof($file)) {
                $text .= fgets($file) . "<br>";
            }
            fclose($file);
            $adsDict[$categoryName][] = ['title' => $title, 'email' => $email, 'text' => $text];
        }
    }
}