<?php

class AuthassignmentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('deny',  // deny all users
				'actions'=>array('create','admin','delete', 'view','index','update'),
				'users'=>array('?'),
			),
		
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin','delete', 'view','index'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Authassignment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Authassignment']))
		{
			$model->attributes=$_POST['Authassignment'];
			$post=$_POST['Authassignment'];
			//var_dump($post);
			//$userid=$post["userid"];
			//$itemname = $post["itemname"];
			//verifica si ya existe un registro que ha asignado el usuario al laboratorio para que no muestre error de sql cuando el registro existe
			if(!Authassignment::model()->find('userid=:userid AND itemname=:itemname', array(':itemname'=>$model->itemname,':userid'=>$model->userid))){
				if($model->save()){
					$this->redirect(array('usuario/view', 'id'=>$model->userid));
				}
			}else{
				 $model->addError('id_usuario','El usuario ya tiene ese rol asignado');
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($userid, $name)
	{
	//var_dump("hola");
			// we only allow deletion via POST request
			$this->loadModel($name,$userid )->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect('index.php?r=usuario/view&id='.$userid);
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($itemname, $userid)
	{
		$model=Authassignment::model()->find("itemname=:itemname AND userid=:userid", array(":itemname"=>$itemname,":userid"=>$userid));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


}
