<?php

namespace frontend\components;
use yii\db\Schema;
use Yii;
/**
 * 
 */
class Query
{
	public static function insert($db,$model)
	{
		if($db->createCommand("INSERT INTO register(name, mobile, email, image, dob, password) VALUES ('$model->name','$model->mobile','$model->email','$model->image','$model->dob','$model->password')")->execute())
		{
			return true;
		}
		return false;
	}

	public static function updatecsv($db,$field,$value,$id)
	{

		$query="UPDATE `csv` SET `".$field."`='".$value."' WHERE `id`='".$id."'";
		if($db->createCommand($query)->execute())
		{
			return true;
		}
		return false;
	}
}
?>