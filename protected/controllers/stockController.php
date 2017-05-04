<?php

class stockController extends Controller
{
    public function actionIndex()
    {
        echo 'Salut Stoxck';
    }

    public function actionSaveStock()
    {

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

        if (isset($postData)) {
            $request = json_decode($postData);
        //    echo 'nbr=>'. count($request);
            $i = 0;
            $stock = array();
            foreach ($request as $r => $item) {
                if ($i == 0)  Stock::model()->deleteAll("id_pharmatie = $item->id_pharmatie");
                $stocks = [];
                $stocks['nom_prodLign'] = $item->nom_prodLign;
                $stocks['descrip_prodLign'] = $item->descrip_prodLign;
                $stocks['famile_prodLign'] = $item->famile_prodLign;
                $stocks['qte'] = $item->qte;
                $stocks['prix'] = $item->prix;
                $stocks['id_pharmatie'] = $item->id_pharmatie;

                array_push($stock, $stocks);
                $i++;
            }
           $nb=count($stock);
            $y=0;
            foreach ($stock as $item => $value) {
                //  print_r($value);
                $model = new stock();
                $model->attributes = $value;
                $model->save(false);
            //    echo 'model=>' . print_r($model->attributes);
                $y++;
            }
            if($y=$nb){
                echo json_encode(['responces'=>"Success"]);
            }else{
                json_encode(['responces'=>"Error"]);
            }

        } else {
            echo "Not called properly with username!";
        }
    }

}