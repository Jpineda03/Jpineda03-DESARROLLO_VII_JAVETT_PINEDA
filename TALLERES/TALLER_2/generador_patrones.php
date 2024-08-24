
<?php

$filas = 5;

// bucle for
echo "Piramide de 5 filas:<br><br>";

for ($i = 1; $i <= $filas; $i++) {
  for($j = 1; $j <= $i; $j++){
    echo "*";
  }
  echo "<br>";
}

// bucle while
$n = 0;
echo "Números impares del 1 al 20:<br><br>";
while ($n < 20) {
    $n++;
    if ($n % 2 == 0) {
        continue;
    }
    echo "$n <br>";
}
echo "<br><br>";

//contador
$contador = 10;
echo "Cuenta regresiva del 10 al 1 con do-while:<br><br>";
do {
    if ($contador == 5) {
        echo "";
    }else{
        echo "$contador <br>";
    }
    ($contador--);
} while ($contador >= 1);

echo "<br><br>";

?>