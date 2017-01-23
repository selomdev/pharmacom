<?php

/**
 * Created by PhpStorm.
 * User: Moumine Arthur
 * Date: 21/01/2017
 * Time: 21:33
 */
class forfaitController extends Controller
{

    public function actionAllForfait()
    {
        $i=0;
        $pharms=[];
        $Forfaits = Forfaiit::model()->findAll();
        //$result= json_encode($Forfait);
        $data=array();

        foreach($Forfaits as $phar){

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

}