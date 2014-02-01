<?php

class ProgramaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('deny', // deny all users
                'actions' => array(),
                'users' => array('?'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('ProgramasPublicados', 'SubirArchivo', 'UploadNewAttachment', 'enviarMailAdjunto'),
                'roles' => array('admin'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('ProgramasPublicados', 'SubirArchivo', 'UploadNewAttachment', 'enviarMailAdjunto'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * este metodo se encarga de enviarle a un usuario super admiminstrador la confirmacion de que se ha adjuntado un nuevo archivo en un programa
     * @author Oskar<oscarmesa.elpoli@gmail.com>
     */
    public function actionenviarMailAdjunto($usuario=null,$adjunto=null) 
    {
//        if($usuario == null)
//            $usuario = V7guiUsers::model()->findByPk(Yii::app()->user->id);
//        if($adjunto == null)
//            $adjunto = V7guiK2Attachments::model()->findByPk(7);
//        echo '<pre>';
//        print_r($adjunto);
//        print_r($adjunto->item);
//        exit();
            $message            = new YiiMailMessage();
            $message->view = "nuevoAdjunto";                   
            $params              = array('usuario'=>$usuario,'adjunto'=>$adjunto,'usuarioPublicador'=>V7guiUsers::model()->findByPk(Yii::app()->user->id));
                $message->subject    = 'Adjuntado nuevo documento en el programa '.$adjunto->item->title;
            $message->setBody($params, 'text/html'); 
            if($usuario->email == 'oscarmesa.elpoli@gmail.com')
            {
                $message->addTo($usuario->email);
                $message->from = 'info@aerovision.com.co';   
                Yii::app()->mail->send($message);  
            }
    }

    public function actionProgramasPublicados() {
        echo $this->renderPartial('programas_publicados', array(), true);
    }

    public function actionUploadNewAttachment() {
        
    }

    public function actionSubirArchivo($id) {
           
        if (isset($_FILES['archivo'])) {
            Yii::import("application.models.appjoomla.*");
            for ($i = 0; $i < count($_FILES['archivo']['name']); $i++) {
                $adjunto = new V7guiK2Attachments();
                $adjunto->itemID = $id;
                $adjunto->filename = $_FILES['archivo']['name'][$i];
                $adjunto->title = $_FILES['archivo']['name'][$i];
                $adjunto->titleAttribute = $_FILES['archivo']['name'][$i];
                $adjunto->hits = 0;

                //esta ruta se debe cambiar cuando se suban los archivos.
                if (copy($_FILES['archivo']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/aerovision/media/k2/attachments/' . $_FILES["archivo"]["name"][$i])) {
                    if ($adjunto->save()) {
                        $UsuariosAdmi = V7guiUsers::model()->with('grupos')->findAll('grupos_grupos.group_id=8');

                        foreach ($UsuariosAdmi as $usuario) {
                            $this->actionenviarMailAdjunto($usuario, $adjunto);
                        }
                        echo 'almaceno';
                    } else {
                        echo 'no se pudo almacenar';
                        print_r($adjunto->errors);
                        exit();
                    }
                }
            }
            $this->redirect(array(Yii::app()->defaultController));
        } else {
            Yii::import("application.models.appjoomla.*", true);
            $this->render('subirArchivo', array(
                'model' => V7guiK2Items::model()->findByPk($id),
            ));
        }
    }

}
