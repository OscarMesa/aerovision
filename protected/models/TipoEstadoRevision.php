<?php

/**
 * This is the model class for table "tipo_estado_revision".
 *
 * The followings are the available columns in table 'tipo_estado_revision':
 * @property integer $id_estado
 * @property string $nombre_estado
 *
 * The followings are the available model relations:
 * @property Revision[] $revisions
 */
class TipoEstadoRevision extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wwwaerov_appaerovision.tipo_estado_revision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_estado', 'required'),
			array('nombre_estado', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_estado, nombre_estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'revisions' => array(self::HAS_MANY, 'Revision', 'id_estado_revision'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_estado' => 'Id Estado',
			'nombre_estado' => 'Nombre Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('nombre_estado',$this->nombre_estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoEstadoRevision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public static function buscarEstadosFiltro()
        {
            $sql = "SELECT c1.name name1,c1.id id1,
                           c2.name name2,c2.id id2,
                           c3.name name3,c3.id id3,
                           c4.name name4, c4.id id4
                        FROM v7gui_k2_categories AS c1
                        LEFT JOIN v7gui_k2_categories AS c2 ON (c2.parent= c1.id)
                        LEFT JOIN v7gui_k2_categories AS c3 ON (c3.parent= c2.id)
                        LEFT JOIN v7gui_k2_categories AS c4 ON (c4.parent= c3.id)
                    WHERE c1.parent = ?";
            $cmd = Yii::app()->db->createCommand($sql);
            $resulset = $cmd->queryAll(true, array($categoria_padre));
            $categorias = array(array('label' => 'Destinos',));
            foreach ($resulset as $r) {
                $i = 0;
                $j=0;
                $parents = '';
                $name;
                foreach ($r as $categoria) {
                    if($categoria != NULL && $j%2!=0){
                        if (!array_key_exists($categoria, $categorias)){
                                $categorias[$categoria] = array('label'=>V7guiK2Categories::generarGuiones($i).$name, 'url'=>'#cat,'.$categoria);
                        }
                        $parents = $parents.$categoria.',';
                        $i++;
                    }else{
                        $name = $categoria;
                    }
                    $j++;
                }             
            } 
            return $categorias;
        }
}
