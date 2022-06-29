<?php
header("content-type:text/html; charset-utf8");

//variaveis
$nome = "";
$peso = 0;
$altura = 0;
$msg = "";
$calculo = 0;
$imagem = "";

if(isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["peso"]) && !empty($_POST["peso"]) && isset($_POST["altura"]) && !empty($_POST["altura"])){
    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $calculo = $peso / ($altura * $altura);
    $calculo = number_format($calculo,3, '.', '');

    if($calculo < 16){
        $msg = "<label style='color: lightblue'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra com peso deficitario</label>";
        $imagem = "<img src='img\muitoabaixo.png'>";
    }elseif($calculo < 18.5){
        $imagem = "<img src='img\abaixo.png'>";
        $msg = "<label style='color: blue'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra abaixo do peso</label>";
    }elseif($calculo < 24){
        $imagem = "<img src='img/normal.png'>";
        $msg = "<label style='color: orange'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra com peso normal</label>";
    }elseif($calculo < 30){
        $imagem = "<img src='img\acima.png'>";
        $msg = "<label style='color: green'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra acima do peso</label>";
    }elseif($calculo < 35){
        $imagem = "<img src='img\ob1.png'>";
        $msg = "<label style='color: orangered'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra com obesidade nivel 1</label>";
    }elseif($calculo < 40){
        $imagem = "<img src='img\ob2.png'>";
        $msg = "<label style='color: darkred'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra com obesidade nivel 2</label>";
    }elseif($calculo > 40){
        $imagem = "<img src='img\ob3.png'>";
        $msg = "<label style='color: red'>O paciente {$nome}, possui {$altura} metros de altura e pesa {$peso} kilos<br>Seu IMC e de {$calculo}<br>Ele se encontra com obesidade nivel 3</label>";
    }else{
        $msg = "Ocorreu um erro";
    }
}else{
    header("location: formimc.html");
}

//saida para o site
echo "<h1>Formulario IMC</h1>";
echo "<h3>{$msg}</h3>";
echo "<h3>{$imagem}</h3>";
echo "<a href='formimc.html'>Voltar</a>"
?>
