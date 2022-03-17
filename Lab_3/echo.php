<?php

include "create.php";

foreach (crt::$categoriesNameList as $categoryName) {
    echo "<option>" . $categoryName . "</option>";
}