<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilidades
 *
 * @author omesa
 */
class Utilidades {

    //put your code here
    public static function hola() {
        echo 'hola';
    }

    public static function popDropBox($data) {
        $links = '';
        foreach ($data as $row) {
            $links .= '<li><a href="http://localhost/aerovision/media/k2/attachments/' . $row->filename . '">' . $row->filename . '</a></li>';
        }
        return $links;
    }

    public static function generarLink($id) {
        return '<a href="' . Yii::app()->createUrl('programa/subirArchivo/' . $id) . '" class="btn btn-small"><i class="icon-upload "></i></a>';
    }

}

?>
