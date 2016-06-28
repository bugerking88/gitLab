<?php
function cmp($a, $b)//比較看不要交換
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$a = array(3, 2, 5, 6, 1);
usort($a, "cmp");
foreach ($a as $key => $value) {
    echo "$key: $value <br />";
}

?>