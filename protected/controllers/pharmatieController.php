<?php

class PharmatieController extends Controller
{
    /**
     ** Fonction retournant tous les donnees contenues dans la table pharmatie
     **/
    public function actionAllPharmacie()
    {
        $i = 0;
        $pharms = [];
        $Parmaties = PharmatieEnligne::model()->findAll();
        $result = json_encode($Parmaties);
        $data = array();

        foreach ($Parmaties as $phar) {

            $pharms[$i] = $phar->attributes;

            $i++;
        }
        foreach ($pharms as $pharm => $value) {
            $champs = array();
            foreach ($value as $key => $v) {
                $champs[$key] = ($v);
            }
            $data[$pharm] = $champs;
        }
        header("Access-Control-Allow-Origin:*");
        header("Content-Type:application/json;charset=utf-8");
//echo(json_encode($data));
        echo json_encode($pharms);

    }

    /**
     * Fonction recuperant les pharmacies
     */
    public function actionNotSupPharmacie()
    {
        $i = 0;
        $pharms = [];
        $Parmaties = PharmatieEnligne::model()->findAll("BoolSupp=0");
        $result = json_encode($Parmaties);
        $data = array();

        foreach ($Parmaties as $phar) {

            $pharms[$i] = $phar->attributes;

            $i++;
        }
        foreach ($pharms as $pharm => $value) {
            $champs = array();
            foreach ($value as $key => $v) {
                $champs[$key] = ($v);
            }
            $data[$pharm] = $champs;
        }
        header("Access-Control-Allow-Origin:*");
        header("Content-Type:application/json;charset=utf-8");
//echo(json_encode($data));
        echo json_encode($pharms);

    }

    public function actionDeletePharmacie()
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
            $id = $request->id;
            $model = $this->loadModel($id);
            $model->BoolSupp = 1;
            if ($model->validate()) {
                if ($model->save()) {
                    echo json_encode(['responces'=>"Success"]);
                } else {
                    echo json_encode(['responces'=>"Error"]);
                }
            } else {
                $error = $model->getErrors();
                echo json_encode($error);
            }
        }
    }
    public function actionActiverPharmacie()
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
            $id = $request->id;
            $model = $this->loadModel($id);
            $model->BoolSupp = 0;
            if ($model->validate()) {
                if ($model->save()) {
                    echo json_encode(['responces'=>"Success"]);
                } else {
                    echo json_encode(['responces'=>"Error"]);
                }
            } else {
                $error = $model->getErrors();
                echo json_encode($error);
            }
        }
    }

    /**
     * Fonction recuperant les pharmacies
     */

    public function actionAddPharmacie()
    {
        $model = new PharmatieEnligne();
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
            //$username = $request->nom_pharmaLign;
            foreach ($request as $k => $v) {
                $model->$k = $v;
            }
            if ($model->validate()) {
                if ($model->save()) {
                    echo json_encode(['responces'=>"Success"]);
                } else {
                    echo json_encode(['responces'=>"Error"]);
                }
            } else {
                $error = $model->getErrors();
                echo json_encode($error);
            }
        } else {
            echo "Not called properly with username!";
        }


    }
    public function actionAddContact()
    {
        $model = new Contactlign();
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
            //$username = $request->nom_pharmaLign;
            foreach ($request as $k => $v) {
                $model->$k = $v;
            }
            if ($model->validate()) {
                if ($model->save()) {
                    echo json_encode(['responces'=>"Success"]);
                } else {
                    echo json_encode(['responces'=>"Error"]);
                }
            } else {
                $error = $model->getErrors();
                echo json_encode($error);
            }
        } else {
            echo json_encode("Not called properly with username!");
        }


    }

    public function actionDeleteContact()
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

        if ($postData){
            $request = json_decode($postData);
            //var_dump($request->id_ContactLign);die();
            $id = intval($request->id_ContactLign,8);

            $model = $this->loadContactModel($id);
           // $model->delete();
            if($model->delete()){
                echo json_encode(['responces'=>"Success"]);
            }else{
                echo  json_encode(['responces'=>"Error"]);
            }

        }

    }

    public function actionVuePharmacie()
    {
        if (isset($_GET['q'])) {
            $id = $_GET['q'];
            $contact = [];
            $abonnement = [];
            $stock = [];
            $contatf = [];
            $stockf = [];
            $abonnementf = [];
            $pharmacie = PharmatieEnligne::model()->find("id=$id");
            $contacts = Contactlign::model()->findAll("id_pharmatie=$id");
            $stocks = Stock::model()->findAll("id_pharmatie=$id");

            $criteria = new CDbCriteria;
            $criteria->select = '*';
            $criteria->join = 'JOIN forfaiit f ON f.id_forfaiit = t.id_forfaiit';
            // $criteria->condition = "id_pharm_id=$id";
            $sql = "SELECT * FROM abonnement a 
                   NATURAL JOIN forfaiit f
                   WHERE a.id_pharm_id=$id
                   ";
            $provider = new CSqlDataProvider($sql, array(
                //'totalItemCount'=>$count,
                'sort' => array(
                    'attributes' => array(
                        'id_forfaiit', 'date_abonnement', 'dateExpire',
                    ),
                ),
//                'pagination'=>array(
//                    'pageSize'=>10,
//                ),
            ));
            $abonnements = $provider->getData();

            $i = 0;
            foreach ($contacts as $contac) {

                $contatf[$i] = $contac->attributes;

                $i++;
            }
            foreach ($contatf as $cont => $value) {
                $champs = array();
                foreach ($value as $key => $v) {
                    $champs[$key] = ($v);
                }
                $contact[$cont] = $champs;
            }

            /**
             * Stock Pharmatice
             */


            foreach ($stocks as $stoc) {

                $stockf[$i] = $stoc->attributes;

                $i++;
            }
            foreach ($stockf as $stok => $value) {
                $champs = array();
                foreach ($value as $key => $v) {
                    $champs[$key] = ($v);
                }
                $stock[$stok] = $champs;
            }
            /**
             * Historique des abonnements
             */

//print_r($abonnements);die();
            foreach ($abonnements as $abon) {

                $abonnementf[$i] = $abon;

                $i++;
            }
            foreach ($abonnementf as $abonne => $value) {
                $champs = array();
                foreach ($value as $key => $v) {
                    $champs[$key] = ($v);
                }
                $abonnement[$abonne] = $champs;
            }
            /**
             * Encodage des donnees en json
             */

            header("Access-Control-Allow-Origin:*");
            header("Content-Type:application/json;charset=utf-8");
            echo json_encode(['Pharmacie' => $pharmacie->attributes, 'Contact' => $contact, "Stock" => $stock, "Abonnement" => $abonnement]);
//            echo  json_encode();
        } else {
            echo 'Nooooooo!!!!';
        }

    }

    public function actionUpdate()
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

            $id = $request->id;

            $model = $this->loadModel($id);
            foreach ($request as $k => $v) {
                $model->$k = $v;
            }
            if ($model->validate()) {
                if ($model->save()) {
                    echo json_encode(['responces'=>"Success"]);
                } else {
                    echo json_encode(['responces'=>"Error"]);
                }
            } else {
                $error = $model->getErrors();
                echo json_encode($error);
            }


        }


    }
    public function actionUpdateContact()
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

            $id = $request->id_ContactLign;

            $model = $this->loadContactModel($id);
            foreach ($request as $k => $v) {
                $model->$k = $v;
            }
            if ($model->validate()) {
                if ($model->save()) {
                    echo json_encode(['responces'=>"Success"]);
                } else {
                    echo json_encode(['reponces'=>"Error"]);
                }
            } else {
                $error = $model->getErrors();
                echo json_encode($error);
            }


        }


    }


    public function loadModel($id)
    {
        $model = PharmatieEnligne::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    public function loadContactModel($id)
    {
        $model = Contactlign::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}