<?php
// echo 'Hello World';

//int
// $intVar = 1;
// var_dump($intVar);

//float
// $num = 1.2;
// var_dump($num);

// $resultado = (int) (4 / 3);
// // el resultado lo da en entero
// var_dump($resultado);

// $arrayVar = ['color1' => 'red',
// 'color2' => 'blue',
// 3 => 'black'
// ];

// var_dump($arrayVar);
// var_dump($arrayVar['color1']);

// $x=4;
// if ($x==1){
//   echo "es uno";
// }
// elseif ($x==2) {
//   echo "es dos";
// }

// switch ($x) {
//   case 1:
//     echo "es uno";
//     break;
//
//     case 2:
//       echo "es dos";
//       break;
//
//   default:
//     echo "ninguno";
//     break;
// }

$names = ['alex', 'andres', 'blanca'];
foreach ($names as $key => $name) {
  echo $key . ' - ' .$name . '<br>';
}
?>
