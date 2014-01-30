<?php

    Yii::import("application.models.appjoomla.*", true);
    $criteria = new CDbCriteria();
    $criteria->alias = 'item';
    $criteria->with = array(
        'arch_adjuntos' => array(
            'alias' => 'a_adj',
        ),
        'category' => array(
            'aliar' => 'cat',
        ),
    );
    $criteria->addInCondition('item.catid', V7guiK2Categories::buscarTodasCategorias(3));
    //$criteria->params = array('3');
    $dataProvider = new CActiveDataProvider('V7guiK2Items', array(
        'criteria' => $criteria,
        'pagination' => array(
                'pageSize' => 20,
         )
            )
    );
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'lista-programas',
        'dataProvider' => $dataProvider,
        //'filter' => V7guiK2Items::model(),
        'type' => 'striped bordered condensed', 
        'columns' => array(
            'title',
            'created',
            'modified',
            'publish_down',
            array(
                'type' => 'raw',
                'header'=> 'Adjuntos',
                'value' => 'popDropBox($data->arch_adjuntos)'
                ),
//
//           array(
//                'header' => 'custom',
//                'type'=>'raw',
//                 'value' => '($data->field1 > 10) ? "<a><span class=\"icon-gift\"></span></a>" : "<a><span class=\"icon-camera\"></span></a>"',
            ),
//        ...
        )
       );
    
    function popDropBox($data)
    {
        $links = '';
        foreach ($data as $row) {
            $links .= '<li><a href="http://localhost/aerovision/media/k2/attachments/'.$row->filename.'">'.$row->filename.'</a></li>';
        }
        return $links;
    }
?>
