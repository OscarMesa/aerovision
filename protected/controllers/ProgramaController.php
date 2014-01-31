<?php

class ProgramaController extends Controller
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
				'actions'=>array(),
				'users'=>array('?'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('ProgramasPublicados','SubirArchivo','UploadNewAttachment'),
				'roles'=>array('admin'),
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
                            'actions' => array('ProgramasPublicados','SubirArchivo','UploadNewAttachment'),
                            'users' => array('*'),
                         ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),

		);
	}
        
        
        public function actionProgramasPublicados()
        {
            echo $this->renderPartial('programas_publicados',array(), true);
        }
        
        public function actionUploadNewAttachment()
        {
            
        }


        public function actionSubirArchivo($id)
        {
         //  echo '<pre>';
        //  echo count($_FILES['archivo']['name']);
                       //     print_r($_FILES);
                        
////            
            if(isset($_FILES['archivo']))
            {
                Yii::import("application.models.appjoomla.*");
                for($i=0;$i<count($_FILES['archivo']['name']);$i++)
                {
                    $adjunto = new V7guiK2Attachments();
                    $adjunto->itemID = $id;
                    $adjunto->filename = $_FILES['archivo']['name'][$i];
                    $adjunto->title = $_FILES['archivo']['name'][$i];
                    $adjunto->titleAttribute = $_FILES['archivo']['name'][$i];
                    $adjunto->hits = 0;
                    
                    //esta ruta se debe cambiar cuando se suban los archivos.
                    if(copy($_FILES['archivo']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'].'/aerovision/media/k2/attachments/'.$_FILES["archivo"]["name"][$i]))
                    {  if($adjunto->save())
                     {
                         echo 'almaceno';
                     }else{
                         echo 'no se pudo almacenar';
                         print_r($adjunto->errors);
                         exit();
                     }
                    }  
                }
                $this->redirect(array(Yii::app()->defaultController));
            }
            else{
                Yii::import("application.models.appjoomla.*", true);
                $this->render('subirArchivo',array(
                    'model'=>V7guiK2Items::model()->findByPk($id),
                        ));
            }
        }
        
}
