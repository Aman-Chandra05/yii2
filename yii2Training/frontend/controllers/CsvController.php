<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Csv;
use Yii;
use yii\web\UploadedFile;

class CsvController extends Controller
{
    public function actionIndex()
    {
       $model = new Csv();
       return $this->render('index', [
            'model' => $model,
        ]);	
    }    

    public function actionImport()
    {
    	$model = new Csv();
    	$path=Yii::getAlias('@var');
    	$update=$insert=$delete=false;
    	$set='';
        if ($model->load(Yii::$app->request->post())) 
        {
            if($_FILES['Csv']['name']['csv']!='')
            { 
                $model->csv = UploadedFile::getInstance($model, 'csv');
                $csvname='export.'.$model->csv->extension;
                $model->csv->saveAs($csvname);
                $model->csv=$csvname;
            }
        	$db=Yii::$app->db;
        	$file=fopen($csvname, "r") or die("Unable to open file!");
	        //$file=fopen($path.'/'.$_FILES['Csv']['name']['csv'], "r") or die("Unable to open file!");
	        while($row=fgetcsv($file))
			{	
				$data[]=$row;
			}
			fclose($file);
			$firstrow=true;
			foreach ($data as $key) 
			{
				if($firstrow)
				{
					$idh=array_search('id', $key);
					$nameh=array_search('name', $key);
					$emailh=array_search('email', $key);
					$firstrow=false;
				}
				else
				{
					$record=Yii::$app->db->createCommand("SELECT * FROM `csv` WHERE `id`='$key[$idh]'")->queryOne();
					if($record)
					{ 
						if($key[$nameh]!=$record['name'])
						{
							if($set!=''){
								$set.=',';
							}
							$set="`name`="."'".$key[$nameh]."'";
						}
						if($key[$emailh]!=$record['email'])
						{
							if($set!=''){
								$set.=',';
							}
							$set.="`email`="."'".$key[$emailh]."'";
							if($db->createCommand("UPDATE `csv` SET `email`='$key[$emailh]' WHERE `id`='$key[$idh]'")->execute())
							{
								$update=true;
							}
						}
						if($set!='')
						{
							$query="UPDATE `csv` SET ".$set." WHERE `id`='$key[$idh]'";
							if($db->createCommand($query)->execute())
							{
								$update=true;
							}
						}
						if($update){
							Yii::$app->session->setFlash('success', 'Updation Successfull.');
						}					
					}
					else
					{
						if($db->createCommand("INSERT INTO `csv`(`id`,`name`, `email`) VALUES ('$key[$idh]','$key[$nameh]','$key[$emailh]')")->execute()){
							$insert=true;
							Yii::$app->session->setFlash('success', 'Insertion Successfull.');
						}
					}
					$idt=Yii::$app->db->createCommand("SELECT `id` FROM `csv`")->queryColumn();
					$idf=array_column($data, $idh);
					for ($i=0; $i < count($idt) ; $i++) { 
						if(!in_array($idt[$i],$idf))
						{
							if(Yii::$app->db->createCommand("DELETE FROM `csv` WHERE `id`='$idt[$i]'")->execute()){
								$delete=true;
								Yii::$app->session->setFlash('success', 'Deletion, Successfull.');
							}
						}
					}
				}
			}
        }
        if($update && $insert && $delete){
        		Yii::$app->session->setFlash('success', 'Insertion,Deletion,Updation Successfull.');
        }
        else
        {
        	if($update && $insert){
        		Yii::$app->session->setFlash('success', 'Insertion,Updation Successfull.');
        	}
        	if($insert && $delete){
        		Yii::$app->session->setFlash('success', 'Deletion,Insertion Successfull.');
        	}
        	if($delete && $update){
        		Yii::$app->session->setFlash('success', 'Deletion,Updation Successfull.');
        	}
        }
        return $this->redirect('index');
    }

	public function actionExport($name='')
	{
		$path=Yii::getAlias('@var');
		if(!is_dir($path)){
    		mkdir($path,0777);
    	}
    	$data=Yii::$app->db->createCommand("SELECT * FROM `csv`")->queryAll();
    	$file = fopen("export.csv","w");
		fputcsv($file, ['id','name','email']);
		foreach ($data as $key) {
			fputcsv($file, $key);
		}
		fclose($file);
		if($name!='')
		{
			$path=Yii::getAlias('@var');
			$filepath=$name;
			if(!empty($name) && file_exists($filepath))
			{
				header("Cache-Control: public");
				header("Content-Description: FIle Transfer");
				header("Content-Disposition: attachment; filename=$name");
				header("Content-Type: application/zip");
				header("Content-Transfer-Emcoding: binary");
				readfile($filepath);
				exit;
			}
			else{
				echo "This File Does not exist.";
			}
		}
	}
}
?>