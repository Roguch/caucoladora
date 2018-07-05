<?php
$ip_privados = array(10,192,168,127,169,254,172);
$potencia = 32 - $_POST['mascara'];
$sub_rede = pow(2,$potencia);
$qtd_sub_redes = 256/$sub_rede;
$localhost = $sub_rede * (floor($_POST['d'] / $sub_rede));
#1
function qtd_de_sub_redes($sub_redes){
    $numero_sub_rede = 256/$sub_redes;
    return $numero_sub_rede;
}
#2
function qtd_de_enderecos($sub_redes){
    $qtd_enderecos = $sub_redes;
    return $qtd_enderecos;
}
#3
function qtd_de_host($sub_redes){
    $host = $sub_redes - 2;
    return $host;
}
#4
function pri_host_ip_infor($localhosts)
{
    $pri_ip_vali = $localhosts  + 1;
    return $pri_ip_vali;
}
#5
function uti_host_ip_infor($broadcasts){
    $ulti_ip_val = $broadcasts - 1;
    return $ulti_ip_val;
}
#6
function broadcast_ip_infor($localhosts,$sub_redes)
{
    $broadcast = $localhosts+ ($sub_redes - 1);
    return $broadcast;
}
#7
function mascara_decimal($sub_redes)
{
    $mascara_ip_decimal = 256 - $sub_redes;
    return $mascara_ip_decimal;
}
#8
function classe_ip()
{
    if ($_POST['a'] <= 127) {
        return $ip_classe = "A";
    } elseif ($_POST['a'] <= 191) {
        return $ip_classe = "B";
    } elseif ($_POST['a'] <= 223) {
        return $ip_classe = "C";
    } elseif ($_POST['a'] <= 239) {
        return $ip_classe = "D";
    } else {
        return $ip_classe = "E";
    }
}
#9
function ip_privado(array $ips_privados)
{
    if ($_POST['a'] == $ips_privados[0]) {
       return $resposta = "ip privado";
    } elseif ($_POST['a'] == $ips_privados[1] && $_POST['b'] == $ips_privados[2]) {
       return $resposta = "ip privado";
    } elseif ($_POST['a'] == $ips_privados[3]) {
       return $resposta = "ip privado";
    } elseif ($_POST['a'] == $ips_privados[4] && $_POST['b'] == $ips_privados[5]) {
        return $resposta = "ip privado";

    }elseif ($_POST['a'] == $ips_privados[6] && $_POST['b']<= 31 && $_POST['b'] >= 16){
        return $resposta = "ip privado";
    }else{
        return $resposta = "ip publico";
    }
}

echo "quantidade de sub-redes: ".qtd_de_sub_redes($sub_rede)."<br>".
     "quantidade de endereços por sub-rede: " .qtd_de_enderecos($sub_rede)."<br>".
     "quantidade de endereços de hosts em cada sub-rede: ".qtd_de_host($sub_rede)."<br>".
     "primeiro endereço de host da sub-rede em que o endereço IP informado se encontra: " .pri_host_ip_infor($sub_rede)."<br>".
     "último endereço de host da sub-rede em que o endereço IP informado se encontra: ".uti_host_ip_infor(broadcast_ip_infor($localhost,$sub_rede))."<br>".
     "endereço de broadcast da sub-rede em que o endereço informado se encontra: ".broadcast_ip_infor($localhost,$sub_rede)."<br>".
     "máscara da rede, em formato decimal: ".mascara_decimal($sub_rede)."<br>".
     "classe a que o IP pertence: ".classe_ip()."<br>".
     "IP é público ou privado: ".ip_privado($ip_privados)."<br>";