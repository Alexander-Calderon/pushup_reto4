<?php

echo "Numero de universidades: ";
$cantidadUniversidades = fgets(STDIN);

for( $i = 0; $i < $cantidadUniversidades; $i++ ){
    echo "Universidad: ";
    $universidad = trim(fgets(STDIN));
    $universidades[$i]["nombre"] = $universidad;

    $votos["aceptan"] = 0;
    $votos["rechazan"] = 0;
    $votos["blancos"] = 0;
    $votos["nulos"] = 0;
    $voto = "";
    while ( strtolower($voto) != "x" ){
        echo "Voto: ";
        $voto = trim(fgets(STDIN));

        if ( !in_array( strtoupper($voto), ["A","R","B","N", "X"]) ) { 
            echo "Voto invalido, repita\n";
            continue;
        }
        
        if( strtoupper($voto) == "A" ){
            $votos["aceptan"]+=1;
        } else if( strtoupper($voto) == "R" ){
            $votos["rechazan"]++;
        } else if( strtoupper($voto) == "B" ){
            $votos["blancos"]++;
        } else if( strtoupper($voto) == "N" ){
            $votos["nulos"]++;
        }
    }
    $universidades[$i]["votos"] = $votos;
    echo $universidades[$i]["nombre"] . ": " . $universidades[$i]['votos']["aceptan"] . " aceptan, "
    . $universidades[$i]['votos']["rechazan"] . " rechazan, "
    . $universidades[$i]['votos']["blancos"] . " blancos, "
    . $universidades[$i]['votos']["nulos"] . " nulos. \n\n"
    ;

}


$aceptan = 0;
$rechazan = 0;
$blancos = 0;
$nulos = 0;

$aceptanFinal = 0;
$rechazanFinal = 0;
$empatanFinal = 0;

foreach( $universidades as $universidad ){
    $aceptan = $universidad['votos']["aceptan"];
    $rechazan = $universidad['votos']["rechazan"];
    $blancos = $universidad['votos']["blancos"];
    $nulos = $universidad['votos']["nulos"];

    if ( $rechazan == $aceptan ){
        $empatanFinal++;
        echo $universidad["nombre"] . " " . $votoFinal . "\n";
        continue;
    }
    $mayor = max($aceptan, $rechazan, $blancos, $nulos);    
    $votoFinal = array_search($mayor, $universidad['votos'] );

    if( $votoFinal == "aceptan" ){
        $aceptanFinal++;
    } else if( $votoFinal == "rechazan" ){
        $rechazanFinal++;
    }
    

}

echo "Universidades que aceptan: " . $aceptanFinal . "\n";
echo "Universidades que rechazan: " . $rechazanFinal . "\n";
echo "Universidades con empate: " . $empatanFinal . "\n";







