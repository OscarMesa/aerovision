<?php

/**
 * This is the model class for table "sede".
 *
 * The followings are the available columns in table 'sede':
 * @property integer $id_sede
 * @property string $nombre_sede
 * @property string $ciudad
 * @property string $descripcion
 * @property string $direccion
 *
 * The followings are the available model relations:
 * @property Tasas[] $tasases
 */
class Sede extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Sede the static model class
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
		return 'sede';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_sede, ciudad', 'required'),
			array('nombre_sede', 'length', 'max'=>50),
			array('ciudad', 'length', 'max'=>32),
			array('descripcion, direccion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_sede, nombre_sede, ciudad, descripcion, direccion', 'safe', 'on'=>'search'),
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
			'tasases' => array(self::HAS_MANY, 'Tasas', 'id_sede'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sede' => 'Id Sede',
			'nombre_sede' => 'Sede',
			'ciudad' => 'Ciudad',
			'descripcion' => 'Descripcion',
			'direccion' => 'Direccion',
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

		$criteria->compare('id_sede',$this->id_sede);
		$criteria->compare('nombre_sede',$this->nombre_sede,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('direccion',$this->direccion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}