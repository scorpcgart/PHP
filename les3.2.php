<?php
//Функция reduce
$array = [1,2,4,8,10,2];
$result = array_reduce($array, function($acc, $item){//на вход принимает массив и лямда функцию. В которой два значения 1-е это аккумулятор 2-е это значение коллекции для данного индекса
  return $item > $acc ? $item : $acc;//Функция должна вернуть новый аккумулятор, произвести какое то действие, аккумулятор протаскивается сковзь все проходы и в конечном итоге возвращается
}, $array[0]);//Начальное значение аккумулятора
print_r($result);//выводит максимальное значение массива

// Функция определяет сколько раз встречалась в исходном массиве эта цифра
$result = array_reduce($array, function($acc, $item){
if(!array_key_exists($item, $acc)){//Проверяет не повторяется ли значение коллекции
$acc[$item] = 1;
}else{
  $acc[$item]++;
}
return $acc;
},[]);

print_r($result);

//reduce_left
$result = reduce_left($array, function($item, $index, $collection, $acc){
  return $item > $acc ? $item : $acc;
}, $array[0]);
print_r($result);
