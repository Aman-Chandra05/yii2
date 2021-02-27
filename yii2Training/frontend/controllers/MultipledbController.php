<?php

namespace frontend\controllers;
use frontend\models\RegistrationForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use Yii;
use yii\caching\Cache;
use frontend\components\Query;

class MultipledbController extends Controller
{	
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $model = new RegistrationForm();
        $data = Yii::$app->Cache->get('result');

        if ($data === false) {
            $msg= 'Data not found in cache. Storing data in cache';
            $data =$model->find()->all();
            \Yii::$app->Cache->set('result', $data);
        }
        else $msg= 'Data found in cache.';

        return $this->render('index', [
            'data' => $data,
            'msg'=>$msg
        ]);
    }

    public function actionCurl()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "curl";

    }

	public function actionRegister()
    {

        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->dob=date('Y-m-d');
            echo $this->enableCsrfValidation;
            if($_FILES['RegistrationForm']['name']['image']!='')
            { 
                $model->image = UploadedFile::getInstance($model, 'image');
                $imgname=time().'.'.$model->image->extension;
                $model->image->saveAs('uploads/'.$imgname);
                $model->image=$imgname;
            }
            $data=array(
                'name'=>$model->name,
                'mobile'=>$model->mobile,
                'image'=>$model->image,
                'email'=>$model->email,
                'dob'=>$model->dob,
                'password'=>$model->password,
            );
            //$url='http://localhost/training/yii2Training/frontend/web/dummy.php';
            $url='http://localhost/training/yii2Training/frontend/web/multipledb/curl';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
            curl_exec($ch);
            /*$db=Yii::$app->db;
            $db2=Yii::$app->db2;
            $query1=Query::insert($db,$model);
            $query2=Query::insert($db2,$model);
            if($query1 && $query2)
            {     
                Yii::$app->session->setFlash('success', 'Record saved in both database');
                return $this->redirect(['multipledb/index']);        
            }*/
        }   
       return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionRefresh()
    {
        Yii::$app->Cache->flush();
        return $this->redirect('index');
    }
}
?>