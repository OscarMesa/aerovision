<?php

/**
 * This is the model class for table "tipodelente".
 *
 * The followings are the available columns in table 'tipodelente':
 * @property integer $id_tipodelente
 * @property string $nombre_tipodelente
 * @property string $caracteristicas
 */
class Tipodelente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tipodelente the static model class
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
		return 'tipodelente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tipodelente, caracteristicas', 'required'),
			array('nombre_tipodelente', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipodelente, nombre_tipodelente, caracteristicas', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipodelente' => 'Id Tipodelente',
			'nombre_tipodelente' => 'Nombre Tipodelente',
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

		$criteria->compare('id_tipodelente',$this->id_tipodelente);
		$criteria->compare('nombre_tipodelente',$this->nombre_tipodelente,true);
		$criteria->compare('caracteristicas',$this->caracteristicas,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}