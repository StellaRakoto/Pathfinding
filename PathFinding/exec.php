<?php

$tab = explode("\n", file_get_contents("laby.txt")); //var_dump (explode("\n"));
var_dump ($tab);

$nbLigne = count($tab) - 1; //echo $nbLigne; (9)
$nbChar = strlen($tab[0]); //echo $nbChar; (15)

// var_dump ($argv).PHP_EOL;

//     $args = parseArgs($argv);
//     echo getArg($args, 'foo');

//     function parseArgs($args) {
//         foreach($args as $arg) {
//             $tmp = explode(':', $arg, 2);
//             if ($arg[0] === '-') {
//                 $args[substr($tmp[0], 1)] = $tmp[1];
//             }
//         }
//         return $args;
//     }

//     function getArg($args, $arg) {
//         if (isset($args[$arg])) {
//             return $args[$arg];
//         }
//         return false;
//     }


function labyOrNot($tab, $nbLigne, $nbChar){

$err1 = "La première et la dernière lignes sont différentes!".PHP_EOL;
$err2 = "La première colonne est différente de la dernière colonne".PHP_EOL;
$err3 = "Un charactère spécial a été inséré dans le laby !".PHP_EOL;


//COMPARAISON PREMIERE ET DERNIERE LIGNE
    if (strlen($tab[0]) !== strlen($tab[$nbLigne])){
        exit($err1);
    }

//COMPARAISON DES TAILLES DE TOUTES LES LIGNES
    for ($j=0; $j<$nbLigne; $j++){

        if (strlen($tab[$j]) !== strlen($tab[$nbLigne])){
            exit($err2);
        }
    }

//COMPARAISON DES LIGNES AVEC LES #
    for ($j=0; $j<$nbLigne; $j++){

        if (($tab[$j][0] !== '#') || ($tab[$j][$nbChar - 1] !== '#') || ($tab[$nbLigne][$j] !== '#')){
            exit($err3);
        }
    }
 }


//DETERMINATION DES CASES DE DEPART ET D'ARRIVEE
function getStart($tab, $nbLigne, $nbChar){

    
    $z = 0;//check 0
    $u = 0;//check 1
    $add = 0;
    $err4 = "Il manque un point de départ ou d'arrivée!".PHP_EOL;

    $xd = 0;
    $yd = 0; //coord du point de départ

    $xa = 0;
    $ya = 0; //coord du point d'arrivée 

    for ($j=0; $j<$nbLigne; $j++){ 
        for ($i=0; $i<$nbChar; $i++){ 
            
            if ($tab[$j][$i] === '0'){
                $z++;
                $z = $z++; // echo $z.' check 0'.PHP_EOL; 
                //RECHERCHE DE COORDONNEES
                $xd = $i;// 
                echo "xd=".($xd)." ";
                $yd = $j;// 
                echo "yd=".($yd).PHP_EOL;
            }
            if ($tab[$j][$i] === '1'){
                $u++;
                $u = $u++; // echo $u .' check 1'.PHP_EOL;
                //RECHERCHE DE COORDONNEES
                $xa = $i;//
                echo "xa=".($xa)." ";
                $ya = $j;//
                echo "ya=".($ya).PHP_EOL; 
            }    
        }
    }

    if ($z === 1 && $u === 1){
        play($tab, $nbLigne, $nbChar, $xd, $yd, $xa, $ya); //echo "the play can beggin".PHP_EOL;
    }
    else
        exit($err4);
}

function play($tab, $nbLigne, $nbChar, $xd, $yd, $xa, $ya){

    $diffCol = $xa - $xd; //echo $diffCol.PHP_EOL;
    $diffLigne = $ya - $yd; //echo $diffLigne.PHP_EOL;
    $i = $xd;
    $j = $yd;
   
    if (($diffCol > 0) && ($xd !== ' ')){
        for ($i=$xd+1; $i<$xa; $i++){
            $tab[$j][$i] = ".";
        }
    }

    else if (($diffCol < 0) && ($xd !== ' ')){
        for ($i=$xd-1; $i>$xa; $i--){
            $tab[$j][$i] = ".";
        }
    } 
        
    if (($diffLigne > 0) && ($yd !== ' ')){
        for ($j=$yd; $j<$ya; $j++){
            $tab[$j][$i] = ".";
        }
    }

    else if (($diffLigne < 0) && ($yd !== ' ')){
        for ($j=$yd; $j>$ya; $j--){
            $tab[$j][$i] = ".";
        } 
    }

    echo(implode("\n", $tab));
}


labyOrNot($tab, $nbLigne, $nbChar);
getStart($tab, $nbLigne, $nbChar);
    





    









    

