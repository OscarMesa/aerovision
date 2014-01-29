<?php

class LenteController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'create','update','admin','agregarFiltro','eliminarFiltro','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
               $filtrosXLente=new CActiveDataProvider('LentesFiltro',array(
		    'criteria'=>array(
		        'condition'=>'id_lente='.$id,
			 ),
		)); 
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                    'filtrosXLente'=>$filtrosXLente,
		));
	}
 /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAgregarFiltro()
	{
		$model=new LentesFiltro();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
          
		if(isset($_POST['LentesFiltro']))
		{
			$model->attributes=$_POST['LentesFiltro'];
			
                        
			$id_lente= $model->id_lente;
			$id_filtro = $model->id_filtro;
			//verifica si ya existe un registro que ha asignado el usuario al laboratorio para que no muestre error de sql cuando el registro existe
			if($id_filtro==""){
                             $model->addError('id_filtro','Debe Seleccionar un filtro');
                        }else{
                            if(!LentesFiltro::model()->find("id_lente=$id_lente AND id_filtro=$id_filtro")){
                                if($model->save()){
                                            $this->redirect(array('lente/view', 'id'=>$model->id_lente));
                                    }
                            }else{
                                     $model->addError('id_filtro','Ya ha asignado ese filtro');
                            }
                        }
		}
                $filtros= CHtml::listData(Filtro::model()->findAll(), 'id_filtro', 'nombre_filtro');
                $filtros = array(""=>"")+$filtros;
		$this->render('agregarFiltro',array(
			'model'=>$model,
                        'filtros'=>$filtros,
		));
	} 
     /**
         *
         * @param integer $id_usuario es el usuario al que vamos a aceptar
         */
        public function actionEliminarFiltro($id_lente, $id_filtro){
            //$id_usuario1 = Yii::app()->user->id;
            
            $data= LentesFiltro::model()->find("id_lente=$id_lente AND id_filtro=$id_filtro");
            //El usuario 2 le da permisos de amistad al usuario 1
            //$relacion->permisos_usuario2 =NULL;
            if($data->delete())
                $this->redirect(array('lente/view', 'id'=>$id_lente));
        }         
        
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Lente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lente']))
		{
			$model->attributes=$_POST['Lente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_lente));
		}

		$this->render('create',array(
			'model'=>$model,
                        'disenos'=>$this->loadDisenos(),
                        'tiposDeLentes'=>$this->loadTiposDeLentes(),
                        'materiales'=>$this->loadMateriales(),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Lente']))
		{
			$model->attributes=$_POST['Lente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_lente));
		}

		$this->render('update',array(
			'model'=>$model,
                        'disenos'=>$this->loadDisenos(),
                        'tiposDeLentes'=>$this->loadTiposDeLentes(),
                        'materiales'=>$this->loadMateriales(),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

        public function loadDisenos(){
            $disenos= CHtml::listData(Diseno::model()->findAll(), 'id_diseno', 'nombre_diseno'); 
            $disenos = array(""=>"")+$disenos;
        
            return  $disenos;
                
        }
        
        public function loadMateriales(){
            $data= CHtml::listData(Material::model()->findAll(), 'id_material', 'nombre_material'); 
            $data = array(""=>"")+$data;
        
            return  $data;      
        }
         public function loadTiposDeLentes(){
            $data= CHtml::listData(Tipodelente::model()->findAll(), 'id_tipodelente', 'nombre_tipodelente'); 
            $data = array(""=>"")+$data;
    
            return  $data;      
        }       
        
        
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Lente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Lente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Lente']))
			$model->attributes=$_GET['Lente'];
                        
		$this->render('admin',array(
			'model'=>$model,
                        'materiales'=>$this->loadMateriales(),
                        'disenos'=>$this->loadDisenos(),
                        'tiposDeLentes'=>$this->loadTiposDeLentes(),
         
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Lente::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='lente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
