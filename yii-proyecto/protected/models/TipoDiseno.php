<?php

/**
 * This is the model class for table "tipo_diseno".
 *
 * The followings are the available columns in table 'tipo_diseno':
 * @property integer $id_tipo_diseno
 * @property string $nombre_tipo_diseno
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Diseno[] $disenos
 */
class TipoDiseno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoDiseno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_diseno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tipo_diseno', 'required'),
			array('nombre_tipo_diseno', 'length', 'max'=>255),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipo_diseno, nombre_tipo_diseno, descripcion', 'safe', 'on'=>'search'),
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
			'disenos' => array(self::HAS_MANY, 'Diseno', 'id_tipo_diseno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_diseno' => 'Id Tipo Diseno',
			'nombre_tipo_diseno' => 'Tipo Diseño',
			'descripcion' => 'Descripcion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_tipo_diseno',$this->id_tipo_diseno);
		$criteria->compare('nombre_tipo_diseno',$this->nombre_tipo_diseno,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}