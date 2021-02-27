<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\RegistrationForm;
use yii\web\UploadedFile;
/**
 * 
 */
class RegisterController extends Controller
{
	public function actionRegister()
    {
        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->dob=date('Y-m-d');
            if($_FILES['RegistrationForm']['name']['image']!='')
            { 

                $model->image = UploadedFile::getInstance($model, 'image');
                $imgname=time().'.'.$model->image->extension;
                $model->image->saveAs('uploads/'.$imgname);
                $model->image=$imgname;
            }
            if($model->save())
            {     
                Yii::$app->session->setFlash('success', 'Record saved in database');
                return $this->redirect(['register/index']);        
            }
        }
       return $this->render('register', [
            'model' => $model,
        ]);     
    }

    public function actionIndex()
    {
        $model = new RegistrationForm();
        $data =$model->find()->all();
                echo "<pre>";
        print_r($data);
        die();
        return $this->render('index', [
            'data' => $data,
        ]);
    }
    public function actionDelete($id)
    {
        $model = new RegistrationForm();
        $data=$model->findOne($id);

        if($data->image!='' && (file_exists('uploads/'.$data->image)))
        {
            unlink('uploads/'.$data->image);
        }
        if($data->delete())
        {
           
            Yii::$app->session->setFlash('success', 'Record Deleted from database');
        }
        return $this->redirect(['register/index']);
    }
    public function actionUpdate($id)
    {
        $model = new RegistrationForm();
        $data=$model->findOne($id);
        $name=$data->name;
        $img=$data->image;
        if ($data->load(Yii::$app->request->post())) 
        {
            $data->dob=date('Y-m-d');
            if($img!='' && $data->image=='')
            {
                $data->image=$img;
            }
            if($_FILES['RegistrationForm']['name']['image']!='')
            { 
                unlink('uploads/'.$img);
                $data->image = UploadedFile::getInstance($data, 'image');
                $imgname=time().'.'.$data->image->extension;
                $data->image->saveAs('uploads/'.$imgname);
                $data->image=$imgname;
            }
            if($data->save())
            {     
                Yii::$app->session->setFlash('success', 'Record Updated in database');
                return $this->redirect(['register/index']);        
            }
        }
        return $this->render('register', [
            'data' => $data,
        ]);
    }

}