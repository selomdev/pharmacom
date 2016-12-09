<?php

class PharmatieController extends Controller{
/**
** Fonction retournant tous les donnees contenues dans la table pharmatie
**/
 public function actionAllPharmatie()
{
 $i=0;
 $pharms=[];
   $Parmaties = PharmatieEnligne::model()->findAll();
  $result= json_encode($Parmaties); 
foreach($Parmaties as $phar){
    $pharms[$i]=$phar->attributes;
 
$i++;
}

  echo json_encode($pharms);

}


}