<?php
//Функциональное программирование. Map: Отображение списков.
$array = range(1,10);
$result = array_map(function($item){//библиотечная функция array_map - принимает на вход анонимную функцию (лямда функцию) и второй парметр массив.
  return $item ** 2;
}, $array);
print_r($result);

//Функциональное программирование. Фильтрация коллекций.
$array1 = range(1,100);
$result1 = array_filter($array1, function($x){ return $x % 2 ==0; });//фильтрация четных чисел из массива
print_r($result1);

$result =  array_filter($array, function($key) { return $key > 5; }, ARRAY_FILTER_USE_KEY);// использование необязательно параметра который указывает что используется ключ. Фильтрация чисел больше 5
print_r($result);

echo "\n";
//пракитческое задание.
//Реализовать функцию которая принимает на вход массив и возвращает сумму квадратов четных чисел.
$evenSquareSum = function ($array){
    $even = array_filter($array, function($item){ return $item % 2 == 0;});
    $squareSum = array_map(function($item){ return ($item * $item);}, $even);
    return array_sum($squareSum);
  };

echo $evenSquareSum($array);
