<?php
// Paham
// Segitiga siku - siku y(1) konsisten, x increment
for ($a = 1; $a <= 5; $a++) {
    for ($b = 1; $b <= $a; $b++) {
        echo "$b";
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku terbalik y(1) konsisten, x increment
for ($c = 5; $c >= 1; $c--) {
    for ($d = 1; $d <= $c; $d++) {
        echo $d;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku y(1) increment, x decrement
for ($e = 1; $e <= 5; $e++) {
    for ($f = $e; $f >= 1; $f--) {
        echo $f;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku y(5) decrement, x decrement
for ($g = 5; $g >= 1; $g--) {
    for ($h = $g; $h >= 1; $h--) {
        echo $h;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku y(5) decrement, x increment
for ($i = 5; $i >= 1; $i--) {
    for ($j = $i; $j <= 5; $j++) {
        echo $j;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku terbalik y(1) increment, x increment
for ($l = 1; $l <= 5; $l++) {
    for ($k = $l; $k <= 5; $k++) {
        echo $k;
    }
    echo "<br>";
}
echo "<br>";


// Segitiga siku - siku y(5) konsisten, x decrement
for ($m = 5; $m >= 1; $m--) {
    for ($n = 5; $n >= $m; $n--) {
        echo $n;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku terbalik y(5) konsisten, x decrement
for ($o = 1; $o <= 5; $o++) {
    for ($p = 5; $p >= $o; $p--) {
        echo $p;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku y(1) increment, x decrement
for ($q = 1; $q <= 5; $q++) {
    for ($r = $q; $r >= 1; $r--) {
        echo $r;
    }
    echo "<br>";
}
echo "<br>";

// Paham
// Segitiga siku - siku terbalik y(5) decrement, x decrement
for ($s = 5; $s >= 1; $s--) {
    for ($t = $s; $t >= 1; $t--) {
        echo $t;
    }
    echo "<br>";
}
