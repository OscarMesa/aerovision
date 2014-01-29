<?php

/**
 * This is the model class for table "diseno".
 *
 * The followings are the available columns in table 'diseno':
 * @property integer $id_diseno
 * @property string $nombre_diseno
 * @property string $caracteristicas
 */
class Diseno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Diseno the static model class
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
		return 'diseno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_diseno, id_tipo_diseno', 'required'),
                        array('caracteristicas', 'safe'),
			array('nombre_diseno', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_diseno, nombre_diseno, caracteristicas', 'safe', 'on'=>'search'),
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
                    'idTipoDiseno0' => array(self::BELONGS_TO, 'TipoDiseno', 'id_tipo_diseno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_diseno' => 'Id',
			'nombre_diseno' => 'Nombre',
			'caracteristicas' => 'Caracteristicas',
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

		$criteria->compare('id_diseno',$this->id_diseno);
		$criteria->compare('nombre_diseno',$this->nombre_diseno,true);
		$criteria->compare('caracteristicas',$this->caracteristicas,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}