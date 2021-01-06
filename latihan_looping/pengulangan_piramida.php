<?php
// Paham
// Pola piramida
for ($b = 10; $b > 0; $b--) {
    for ($p = 1; $p <= $b; $p++) {
        echo " . ";
    }
    for ($x1 = 10; $x1 > $b; $x1--) {
        echo "x";
    }
    for ($x2 = 11; $x2 > $b; $x2--) {
        echo "x";
    }
    echo "<br>";
}
echo "<br><br><br>";

// Pola Belah Ketupat
for ($a = 9; $a > 0; $a--) {
    for ($i = 1; $i <= $a; $i++) {
        echo " .";
    }
    for ($a1 = 9; $a1 > $a; $a1--) {
        echo "x";
    }
    for ($a2 = 10; $a2 > $a; $a2--) {
        echo "x";
    }
    echo "<br>";
}
for ($b = 1; $b <= 9; $b++) {
    for ($j = 1; $j <= $b; $j++) {
        echo " .";
    }
    for ($b1 = 9; $b1 > $b; $b1--) {
        echo "x";
    }
    for ($b2 = 10; $b2 > $b; $b2--) {
        echo "x";
    }
    echo "<br>";
}
