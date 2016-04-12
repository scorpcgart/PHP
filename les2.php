<?php
//Функции первого класса. Возврат как значения.
//Лямда функция которая вычисляет сумму двух чисел
function sumGenerator($func)
{
  return function($a, $b) use ($func) //$func замыкание функции
  {
    return sum($a,$b,$func);
  };
}


function sum($a, $b, $func)
{
if($a > $b)
{
  return 0;
}
return $func($a) + sum($a + 1, $b, $func);
}
$sumInteger = sumGenerator(function($x){ return $x * $x; });
$sumCubes = sumGenerator(function($x) { return $x * $x * $x;});
echo $sumInteger(1,5);
echo "\n";
echo $sumCubes(1,5);

//Практическое задание 1
//Функция принимает один аргумент (множитель) возвращает функцию которая возвращает результат умножения этого аргумента на множитель

function factor($multi){
  return function ($arg) use (&$multi){
    return $arg * $multi;
  };
}
echo "\n";
$multipler = factor(2);
echo $multipler(8);
