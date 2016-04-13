<?php
//Функции первого класса. Возврат как значения.
//Лямда функция которая вычисляет сумму двух чисел
function sumGenerator($func)
{
  return function($a, $b) use ($func) //$func замыкание функции. Функция возвращает анонимную функцию в которую оборачивает нашу базовую функцию sum
  {
    return sum($a,$b,$func);
  };
}

function sum($a, $b, $func)//Лямда функция которая вычисляет сумму двух чисел, (Базовая функция. на ее основе строятся другие функции)
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
echo $multipler(10);
echo "\n";
//Практическое задание №2
//Реализовать функцию double которая принимает как аргумент функцию с одним аргументом  и возвращает функцию которая принимает исходную функцию дважды
function double($func1){
return function ($arg) use (&$func1){
  return $func1($func1($arg));
};
}
$inc = function ($arg){ return $arg + 1;};
$inc2 = double($inc);
$inc4 = double($inc2);
echo $inc4(2);
