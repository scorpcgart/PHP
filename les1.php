<?php
$cube = function($num){
return $num*$num*$num;
};
echo $cube(2) . "\n";

$sumInteger = function($a, $b) use (&$sumInteger)
{
  if($a>$b) {return 0;}
  return $a + $sumInteger($a + 1, $b);
};

echo $sumInteger(3,11) . "\n";

$sumCubes = function($a,$b) use (&$sumCubes)
{
  if ($a > $b)
  {
    return 0;
  }
  return ($a * $a * $a) + $sumCubes($a + 1, $b);//сначала высчитывается сумма куба $a, затем увеличивается на 1 и приследующей итерации уже это число возводиться в куб и так до тех пор пока $a>$b
};

echo $sumCubes(2,4). "\n";
function sum($a,$b,$func)
{
  if ($a>$b)
  {
    return 0;
  }
  return $func($a) + sum($a + 1, $b, $func);
}
echo sum(2,4, $cube) . "\n";

function product($num1,$num2,$func)
{
  if($num1 == $num2)
  {
    return $num2;
  }
  return $func(product($num1,$num2 - 1, $func),$num2);
}
echo product(3,6, function($num1,$num2){return $num1 - $num2;}) . "\n";

function sum1($start, $finish, $func)
{
    // BEGIN (write your solution here)
 $iterr = function ($cur, $acc) use (&$finish, &$func, &$iterr)
   {
       if($cur > $finish)
       {
           return $acc;

       }
       return $iterr($cur + 1, $acc + $func($cur));
   };
   return $iterr($start, 0);
}


echo sum1(1,5, function($x){ return $x;});

    // END
