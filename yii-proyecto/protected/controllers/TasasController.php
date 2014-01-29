<?php

class TasasController extends Controller
{
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'index', 'admin','delete','view'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}    
    
	public function actionIndex()
	{
		$this->render('index');
	}
        
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tasas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tasas']))
			$model->attributes=$_GET['Tasas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tasas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasas']))
		{
			$model->attributes=$_POST['Tasas'];
                        $modelDB = $this->loadModel($model->id_moneda, $model->fecha, $model->id_sede);
                        if($modelDB!=null){
                           $modelDB->venta = $model->venta;
                            $modelDB->compra = $model->compra;
                            if($modelDB->save()){
				$this->redirect(array('view','id_moneda'=>$modelDB->id_moneda,'fecha'=>$modelDB->fecha,'id_sede'=>$modelDB->id_sede));
                            }
                        }else{
                            if($model->save()){
				$this->redirect(array('view','id_moneda'=>$model->id_moneda,'fecha'=>$model->fecha,'id_sede'=>$model->id_sede));
                            }
                        }
			
		}

		$this->render('create',array(
			'model'=>$model,
                        'monedas'=>$this->loadMonedas(),
                        'sedes'=>$this->loadSedes(),
		));
	}
        
        public function loadMonedas(){
            $monedas = Moneda::model()->findAll();
            $monedas = array(""=>"")+$monedas;
            return CHtml::listData($monedas, 'id_moneda','nombre_moneda');
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id_moneda,$fecha, $id_sede)
	{
		$model=$this->loadModel($id_moneda, $fecha, $id_sede);
         
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tasas']))
		{
			$model->attributes=$_POST['Tasas'];
			$modelDB = $this->loadModel($model->id_moneda, $model->fecha, $model->id_sede);
                        if($modelDB!=null){
                             $modelDB->venta = $model->venta;
                            $modelDB->compra = $model->compra;
                            if($modelDB->save()){
				$this->redirect(array('view','id_moneda'=>$modelDB->id_moneda,'fecha'=>$modelDB->fecha,'id_sede'=>$modelDB->id_sede));
                            }
                        }else{
                            if($model->save()){
                                    $this->redirect(array('view','id_moneda'=>$model->id_moneda,'fecha'=>$model->fecha,'id_sede'=>$model->id_sede));
                            }
                        }
		}

		$this->render('update',array(
			'model'=>$model,
                    'monedas'=>$this->loadMonedas(),
                    'sedes'=>$this->loadSedes(),
                    
		));
	}
        	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id_moneda, $fecha, $id_sede)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id_moneda, $fecha, $id_sede),
		));
	}
        public function loadSedes(){
            $data = Sede::model()->findAll();
            $data = array(""=>"")+$data;
            return CHtml::listData($data, 'id_sede','nombre_sede');
        }
        
        public function loadModel($id_moneda, $fecha, $id_sede){
            $criteria = new CDbCriteria();
            $criteria->condition = "id_moneda=$id_moneda AND fecha='$fecha' AND id_sede=$id_sede";
            $tasas=Tasas::model()->find($criteria);
            return $tasas;
        }
        
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}