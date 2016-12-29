<?php

class PharmatieController extends Controller{
/**
** Fonction retournant tous les donnees contenues dans la table pharmatie
**/
 public function actionAllPharmacie()
{
 $i=0;
 $pharms=[];
   $Parmaties = PharmatieEnligne::model()->findAll();
  $result= json_encode($Parmaties);
  $data=array();

foreach($Parmaties as $phar){

    $pharms[$i]= $phar->attributes;
 
$i++;
}
    foreach ($pharms as $pharm=>$value) {
    $champs=array();
    foreach ($value as $key=>$v){
        $champs[$key]=($v);
    }
        $data[$pharm]=$champs;
    }
    header("Access-Control-Allow-Origin:*");
    header("Content-Type:application/json;charset=utf-8");
//echo(json_encode($data));
  echo json_encode($pharms);

}

    public function actionAddPharmacie()
    {
        $model = new PharmatieEnligne();
        $postData=file_get_contents("php://input");
         if(isset($_SERVER['HTTP_ORIGIN'])){
    header("Access-Control-Allow-Origin:{$_SERVER['HTTP_ORIGIN']}");
           // header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Credentials:true");
    header("Access-Control-Max-Age:86400");
}
if($_SERVER['REQUEST_METHOD']=='OPTIONS'){
            if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
            if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allows-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            exit(0);
}


if (isset($postData)){
    $request = json_decode($postData);

    //$username = $request->nom_pharmaLign;
    foreach ($request as $k=>$v){
        $model->$k = $v;
    }
    if($model->validate()){
        if($model->save()) {
            echo json_encode("Success");
        }else{
            echo json_encode("Erreur lors de la sauvegarde des donnees veuillez reessayer");
        }
    }
    else{
       $error= $model->getErrors();
        echo json_encode($error);
    }
}
else{
    echo "Not called properly with username!";
}




}


}