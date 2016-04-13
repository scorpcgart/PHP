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

//Функция zip
$result = array_map(null, range(1,5),range(11,16));//если в array_map указать вместо функции null и передать два массива то возвращает массив где 0 =(1,11) 1=(2,12) 3=(3,13)
print_r($result);

//Практическое задание.
//Реализовать функцию которая принимает на вход результаты попыток и возвращает массив со списком имен футбольных клубов.
function bestAttempt($first, $second)
{
    $result = zip($first, $second, function ($result1, $result2) {
        if ($result1['scored'] > $result2['scored']) {
            return $result1['name'];
        } else if ($result1['scored'] < $result2['scored']) {
            return $result2['name'];
        } else if ($result1['scored'] == $result2['scored']) {
            return null;
        }
    });

    $result2 = array_filter($result, function ($var) {
        return !is_null($var);
    });

    return array_values($result2);
}
