<?php

$potencia = 32 - $_POST['mascara'];
#2
$sub_rede = pow(2,$potencia);
#3
$host = $sub_rede - 2;
#1
$numero_sub = 256/$sub_rede;
$sub_rede_ip = $sub_rede * (floor($_POST['d']/$sub_rede));
#4
$primeiro_ip_val = $sub_rede_ip + 1;
#6
$broadcast = $sub_rede_ip + ($sub_rede - 1);
#5
$ultimo_ip_val = $broadcast - 1;
#7
$mascara_ip_decimal = 256 - $sub_rede;
if ($_POST['a'] <= 127){
    $ip_classe = "A";
}elseif ($_POST['a'] <=191){
    $ip_classe = "B";
}elseif ($_POST['a'] <= 223){
    $ip_classe = "C";
}elseif ($_POST['a'] <= 239){
    $ip_classe = "D";
}else{
    $ip_classe = "E";
}
echo $ip_classe;




$x = -1;


$res = $x < 0 ? "negativo" : ($x == 0 ? "zero" : "positivo") ;
echo $res;

