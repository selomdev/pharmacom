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

    public function actionAbonnement()
    {
        $model = new Abonnement();
        $postData = file_get_contents("php://input");
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin:{$_SERVER['HTTP_ORIGIN']}");
            // header("Access-Control-Allow-Origin:*");
            header("Access-Control-Allow-Credentials:true");
            header("Access-Control-Max-Age:86400");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                header("Access-Control-Allow-Methods:GET,POST,OPTIONS");
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allows-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            exit(0);
        }

        if ($postData){
            $request = json_decode($postData);
            $id_forfait=$request->id_forfait;
            $forfait = $this->loadContactModel($id_forfait);
            // $model->delete();
          /*  if($model->delete()){
                echo json_encode(['responces'=>"Success"]);
            }else{
                echo  json_encode(['responces'=>"Error"]);
            }*/

        }

    }

    public function loadModel($id)
    {
        $model = Forfaiit::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}