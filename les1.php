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
echo sum(2,4, $cube);
