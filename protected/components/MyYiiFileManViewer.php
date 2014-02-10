<?php
class MyYiiFileManViewer extends YiiFileManagerFilePicker
        implements IYiiFileManagerFilePicker
{
    public function yiifileman_classname(){
        return __CLASS__;
    }
 
    public function yiifileman_data(){
        return array(
            'gallery_size'=>array(160,120),
            // for demostration:    
                'identity'=>'123456', 
            // USE IN A REAL SITUATION: 
            'identity'=>Yii::app()->user->id,
            'fileman'=>Yii::app()->fileman,     // <-- BE CAREFULL
            'allow_multiple_selection'=>true,
            'allow_rename_files'=>true,
            'allow_delete_files'=>true,
            'allow_file_uploads'=>true,
                        // change it only if you're not using siteController
            // 'controller'=>'site', 
                        // 'controller'=>'/mymodule/mycontroller', (for modules)
        );  
    }
 
    public function build_file_viewer_url($file_id){
        return parent::build_file_viewer_url($file_id);
    }
 
    public function yiifileman_filter_file_list($list, $extra=array()){
        return $list;
    }
 
    public function yiifileman_get_image_substitution(
        $file_info, $local_path, $mimetype){
    // your code here
        return parent::yiifileman_get_image_substitution($file_info,
            $local_path,$mimetype);
    }
 
    public function yiifileman_on_action($action, $file_ids){
        // action taken: "select" or "delete"
 
        // call parent to perform default stuff
        return parent::yiifileman_on_action($action, $file_ids);
    }
 
    public function yiifileman_accept_file($filename,$filesize, $mimetype,
        $is_server_side, &$reason){
        return true;
    }
}