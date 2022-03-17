<?php

include "create.php";
    foreach ($adTable as $ad) {
        echo "<tr>";
        echo "<td>" . $ad[0] . "</td>";
        echo "<td>" . $ad[1] . "</td>";
        echo "<td>" . $ad[2] . "</td>";
        echo "<td>" . $ad[3] . "</td>";
        echo "</tr>";
    }