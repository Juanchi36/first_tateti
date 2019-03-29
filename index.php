<?php
  
 $tablero = [
    [3, 3, 3],
    [3, 3, 3],
    [3, 3, 3],
 ];
 $cantidadDeJugadas = 9; 
function numeroAleatorio (){
    return rand(0,2);
}
  
function escribirEnElTablero (){
    global $tablero;
    global $cantidadDeJugadas;
    $jugadorActivo=22;
    $hayGanador = false;
    //jugador1= 10
    //jugador2 = 22
     
    do {
         
        $fila = numeroAleatorio();
        $columna = numeroAleatorio();
         
        while (estaVacio($tablero[$fila][$columna])){
            $tablero[$fila][$columna] = $jugadorActivo;
             
            dibujarTableroConsola();
                         
            if($jugadorActivo == 10){
                $jugadorActivo = 22;
            }else{
                $jugadorActivo = 10;
            }
            $cantidadDeJugadas --;
             
        }
        if(hayGanador() == 1){
            $hayGanador = true;
            echo 'Ganó el jugador 1';
        }else if(hayGanador() == 2){
            $hayGanador = true;
            echo 'Ganó el jugador 2';
        }else if($cantidadDeJugadas == 0){
            if(hayGanador() == 1){
                $hayGanador = true;
                echo 'Ganó el jugador 1';
            }else if(hayGanador() == 2){
                $hayGanador = true;
                echo 'Ganó el jugador 2';
            }else{
                $hayGanador = true;
                echo 'Empate';
            }
                 
        }
    }while(!$hayGanador);
}
  
function estaVacio ($position){
    return ($position == 3) ?  true :  false ;
}
  
function hayGanador (){
    global $tablero;
    foreach($tablero as $fila){
        $resultFila = $fila[0] + $fila[1]  + $fila[2];
            if ($resultFila == 30){
                return 1;
            }else if ($resultFila == 66){
                return 2;
            }
        foreach($fila as $valor){
            $arrayValores[] = $valor;
        }
      
    }
    $sumaColumna = 0;
    $sumaColumna2 = 0;
    $sumaColumna3 = 0;
      
    foreach($arrayColumna1 [] = (array_column($tablero, 0)) as $valor){
    $sumaColumna += $valor;
    if ($sumaColumna == 30){
        return 1;
    }else if ($sumaColumna == 66){
        return 2;
    }
    }
      
    foreach($arrayColumna2 [] = (array_column($tablero, 1)) as $valor){
        $sumaColumna2 += $valor;
        if ($sumaColumna2 == 30){
            return 1;
        }else if ($sumaColumna2 == 66){
            return 2;
        }
    }
      
    foreach($arrayColumna3 [] = (array_column($tablero, 2)) as $valor){
        $sumaColumna3 += $valor;
        if ($sumaColumna3 == 30){
            return 1;
        }else if ($sumaColumna3 == 66){
            return 2;
        }
    }
      
    if($tablero[0][0]+$tablero[1][1]+$tablero[2][2] === 30){
        return 1;
    }else if($tablero[0][0]+$tablero[1][1]+$tablero[2][2] === 66){
        return 2;
    }
    if($tablero[2][0]+$tablero[1][1]+$tablero[0][2] === 30){
        return 1;
    }else if($tablero[2][0]+$tablero[1][1]+$tablero[0][2] === 66){
        return 2;
    }
  
}
 
function dibujarTableroConsola(){
    global $tablero;
    foreach($tablero as $fila){ 
        echo ' '. convertirGraficos($fila[0]) . ' ' . convertirGraficos($fila[1]) . ' ' . convertirGraficos($fila[2]) . "\n";
    }
    echo '--------' . "\n";
}
 
function dibujarTableroBrowser(){
    global $tablero;
    foreach($tablero as $fila){ 
        echo ' '. convertirGraficos($fila[0]) . ' ' . convertirGraficos($fila[1]) . ' ' . convertirGraficos($fila[2]) . '</br>';
    }
    echo '--------' . '</br>';
}
 
function convertirGraficos($value){
    switch($value){
        case 3:
            return '-';
        case 10:
            return 'X';
        case 22:
            return 'O';
    }
 
}
 
escribirEnElTablero();