<?php

class CotizacionController extends Controller
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
				'actions'=>array('create','update','agregarFiltro','eliminarFiltro','dynamicTipoDiseno'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','view'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cotizacion; 
                if(!isset($_POST['Cotizacion'])){
                   $model->paso=1;
                   
                }else if(isset($_POST['Cotizacion'])){
                    $model->attributes=$_POST['Cotizacion'];
                    
                       
                    if($model->save()){
                         $model->paso= 2;
                          Yii::app()->user->setFlash('success','Se han guardado sus datos personales');
                        $this->redirect(array('update','id'=>$model->id_cotizacion,'paso'=>2));
                    }else{
                        $model->paso= 1;
                    }
       
                    
                }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                    /*
		if(isset($_POST['Cotizacion']))
		{
			$model->attributes=$_POST['Cotizacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_cotizacion));
		}
*/
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id, $paso)
	{
		$model=$this->loadModel($id);
                $model->paso = $_GET["paso"];
                $model->id_tipodelente = 7;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
 
		if(isset($_POST['Cotizacion']))
		{
			$model->attributes=$_POST['Cotizacion'];
                        if($model->id_diseno!=null){
                        $model->id_tipo_diseno = $model->idDiseno0->id_tipo_diseno;
   
                    
                            }
                        if($model->validate()){
                           //var_dump($model->paso);
                           
                            if($model->paso!=3||($model->paso==3&&($model->id_diseno!=null))){
                                $model->paso = $model->paso+1;
                                $diseno = $model->id_diseno;
                                $material = $model->id_material;
                                if($model->save()){
                                     Yii::app()->user->setFlash('success','Para continuar por favor llenar la siguiente información');    
                                    $this->redirect(array('update','id'=>$model->id_cotizacion,'paso'=> $model->paso));
                                }
                            }elseif($model->paso==3&&($model->id_diseno==null)){
                                $model->addError('id_diseno',"Debe seleccionar el tipo de diseño y diseño");
                            }
                        }
                        
		}
                $criteria=new CDbCriteria;
                $disenos=array();
                if($model->adicion_derecho!=0 || $model->adicion_izquierdo!=0){
                   // $criteria->condition='id_diseno=7 OR id_diseno=8';
                    //$criteria->condition='id_tipo_diseno=1';
                    $tiposDeDiseno =  CHtml::listData(TipoDiseno::model()->findAll('id_tipo_diseno=2 OR id_tipo_diseno=3'), 'id_tipo_diseno', 'nombre_tipo_diseno'); 
                    //$disenos= CHtml::listData(Diseno::model()->findAll($criteria), 'id_diseno', 'nombre_diseno'); 
                    //$disenos = array(""=>"")+$disenos;
                    $tiposDeDiseno = array(""=>"")+$tiposDeDiseno;
                    if($model->id_diseno!=null){
                        $model->id_tipo_diseno = $model->idDiseno0->id_tipo_diseno;
                        $criteria->condition="id_tipo_diseno=$model->id_tipo_diseno";
                      $disenos= CHtml::listData(Diseno::model()->findAll($criteria), 'id_diseno', 'nombre_diseno'); 
                    
                    }
                }else{
                    $criteria->condition='id_tipo_diseno=1';
                    $tiposDeDiseno =  CHtml::listData(TipoDiseno::model()->findAll('id_tipo_diseno=1'), 'id_tipo_diseno', 'nombre_tipo_diseno'); 
                    $disenos= CHtml::listData(Diseno::model()->findAll($criteria), 'id_diseno', 'nombre_diseno'); 
                    
                    
                }
                $disenos = array(""=>"")+$disenos;
                $criteria=new CDbCriteria;
               $criteria->select="id_material, idMaterial0.nombre_material";
               $criteria->condition='id_diseno='.$model->id_diseno;
 
                $materiales= CHtml::listData(Lente::model()->findAll(), 'id_material', 'idMaterial0.nombre_material'); 
		$materiales = array(""=>"")+$materiales;
                 $cotizacionFiltros=new CActiveDataProvider('CotizacionFiltros',array(
		    'criteria'=>array(
		        'condition'=>'id_cotizacion='.$model->id_cotizacion,
			 ),
		)); 

                 
		$this->render('update',array(
			'model'=>$model,
                        'disenos'=>$disenos,
                        'materiales'=>$materiales,
                        'cotizacionFiltros'=>$cotizacionFiltros,
                        'tiposDeDiseno'=>$tiposDeDiseno,
		));
	}
        
        
public function actionDynamicTipoDiseno()
	{
            $tipoDeDiseno = $_POST["Cotizacion"]["id_tipo_diseno"];
	    $data = $this->loadDisenos($tipoDeDiseno);
	    foreach($data as $value=>$name)
	    {  
	    	echo CHtml::tag('option',
	                   array('value'=>$value),CHtml::encode($name),true);
	    }

	}
        
        public function loadDisenos($id_tipo_diseno =null){
            if($id_tipo_diseno!=null){
                $arrayEmpty = array(""=>"");
		$data = Diseno::model()->findAll("id_tipo_diseno=$id_tipo_diseno");
		$data= CHtml::listData($data, 'id_diseno', 'nombre_diseno'); 
		$data= $arrayEmpty + $data;
		return $data;
            }
        }
        
        
      /**
         *
         * @param integer $id_usuario es el usuario al que vamos a aceptar
         */
        public function actionEliminarFiltro($id_cotizacion, $id_filtro){
            //$id_usuario1 = Yii::app()->user->id;
            
            $data= CotizacionFiltros::model()->find("id_cotizacion=$id_cotizacion AND id_filtro=$id_filtro");
            //El usuario 2 le da permisos de amistad al usuario 1
            //$relacion->permisos_usuario2 =NULL;
            if($data->delete()){
                $this->redirect(array('cotizacion/update', 'id'=>$id_cotizacion, 'paso'=>5));
            Yii::app()->user->setFlash('success','Filtro eliminado');
                
            }
        }         
               
        public function cotizar(){
            $model =$this->loadModel($_GET["id"]);
            $lente=null;
            $criteriaLente = new CDbCriteria;
            $criteriaLente->condition = "id_material=$model->id_material AND id_diseno=$model->id_diseno AND id_tipodelente=$model->id_tipodelente";
            $lentes = Lente::model()->findAll($criteriaLente);
            $condicion = "id_cotizacion=$model->id_cotizacion";
            $cotizacionFiltros = CotizacionFiltros::model()->findAll($condicion);
            $contadorFiltrosCotizacion = CotizacionFiltros::model()->count($condicion);
            //Si el usuario escogio filtros debemos buscar los lentes que se acomodan a esas caracteristicas
            if($cotizacionFiltros){
                foreach($lentes as $lente1){
                    $criteria = new CDbCriteria;
                    $criteria->condition = "id_lente=$lente1->id_lente AND (";
                    $cont=0;
                    foreach($cotizacionFiltros as $filtro){
                        if($cont==0)
                            $criteria->condition .= "id_filtro=$filtro->id_filtro";
                        else
                            $criteria->condition .= " OR id_filtro=$filtro->id_filtro";
                        $cont++;
                    }
                     $criteria->condition .= ")";
                     //var_dump($criteria->condition);
                     //$lentes = LentesFiltro::model()->find($criteria);
                     //Con este contamos el numero de filtros que tiene el lente que estamos buscando
                     $contadorFiltrosLente = LentesFiltro::model()->count($criteria);
                     $contadorTotalFiltrosLente = LentesFiltro::model()->count("id_lente=$lente1->id_lente");
                     //Ahora preguntamos si el numero de filtros del lente se igual a los filtros de la cotización, si son iguales es porque el lente cumple las caracteristicas
                     //Con la ultima condicion nos aseguramos que el lente tenga exactamente los filtros que solicita el usuario
                     if($contadorFiltrosLente==$contadorFiltrosCotizacion && $contadorTotalFiltrosLente ==$contadorFiltrosLente){
                         $lente = Lente::model()->find("id_lente=$lente1->id_lente");
                     }else{
                          $retorno = "Actualmente no disponemos de unos lentes adecuados para su formula.";
                     }
                     //var_dump($lentes);
                }
                    
                    //$lentes = LentesFiltro::model()->find($criteria);
            
             //Si el usuario no escogio filtros, mostramos algun lente que no tenga filtros      
            }else{
                //tenemos que buscar un lente que no tenga filtros asociados
                
                foreach($lentes as $lente1){
                    $contadorDeFiltros = LentesFiltro::model()->count("id_lente=$lente1->id_lente");
                    //Verificamos que el lente del ciclo no tenga filtros, porque si se entro a este ELSE es porque el usuario no selecciono filtros
                    if($contadorDeFiltros==0){
                        $lente = Lente::model()->find("id_lente=$lente1->id_lente");
                    }else{
                        $retorno = "Actualmente no disponemos de unos lentes adecuados para su formula.";
                    }
                }
                
                
            }
                
            if($lente!=null){
                //Comprueba los limites inferiores para mostrar el tipo de lente
                
                if(($model->esfera_ojo_derecho > $lente->esfera_limite_superior) || ($model->esfera_ojo_izquierdo > $lente->esfera_limite_superior) || ($model->esfera_ojo_derecho < $lente->esfera_limite_inferior) ||($model->esfera_ojo_izquierdo < $lente->esfera_limite_inferior)||   
                   
                        ($model->cilindro_ojo_derecho > $lente->cilindro_limite_superior) || ($model->cilindro_ojo_izquierdo > $lente->cilindro_limite_superior) || ($model->cilindro_ojo_derecho < $lente->cilindro_limite_inferior) ||($model->cilindro_ojo_izquierdo < $lente->cilindro_limite_inferior) 
                  ){
                    $retorno = "$".number_format($lente->precio_tallado). " pesos colombianos";
                   //si no se cumple la condicion de arriba se muestra el precio del lente terminado
                }else{
                    $retorno = "$".number_format($lente->precio_terminado). " pesos colombianos";
                }
                
            }else{
                $retorno = "Actualmente no disponemos de unos lentes adecuados para su formula.";
            }
            return $retorno ;
            
        }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cotizacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAgregarFiltro($id)
	{
		$model=new CotizacionFiltros();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
          
		if(isset($_POST['CotizacionFiltros']))
		{
			$model->attributes=$_POST['CotizacionFiltros'];
			
                        
			$id_cotizacion= $model->id_cotizacion;
			$id_filtro = $model->id_filtro;
			//verifica si ya existe un registro que ha asignado el usuario al laboratorio para que no muestre error de sql cuando el registro existe
			if($id_filtro==""){
                             $model->addError('id_filtro','Debe Seleccionar un filtro');
                        }else{
                            if(!CotizacionFiltros::model()->find("id_cotizacion=$id_cotizacion AND id_filtro=$id_filtro")){
                                if($model->save()){
                                    Yii::app()->user->setFlash('success','Filtro agregado');
                                            $this->redirect(array('cotizacion/update', 'id'=>$model->id_cotizacion, 'paso'=>5));
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cotizacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cotizacion']))
			$model->attributes=$_GET['Cotizacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Cotizacion::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cotizacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
