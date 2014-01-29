<?php

/**
 * This is the model class for table "tasas".
 *
 * The followings are the available columns in table 'tasas':
 * @property integer $id_moneda
 * @property string $fecha
 * @property double $compra
 * @property double $venta
 * @property integer $id_sede
 *
 * The followings are the available model relations:
 * @property Sede $idSede0
 * @property Moneda $idMoneda0
 */
class Tasas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tasas the static model class
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
		return 'tasas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_moneda, fecha, compra, venta, id_sede', 'required'),
			array('id_moneda, id_sede', 'numerical', 'integerOnly'=>true),
			array('compra, venta', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_moneda, fecha, compra, venta, id_sede', 'safe', 'on'=>'search'),
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
			'idSede0' => array(self::BELONGS_TO, 'Sede', 'id_sede'),
			'idMoneda0' => array(self::BELONGS_TO, 'Moneda', 'id_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_moneda' => 'Id Moneda',
			'fecha' => 'Fecha',
			'compra' => 'Compra',
			'venta' => 'Venta',
			'id_sede' => 'Id Sede',
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

		$criteria->compare('id_moneda',$this->id_moneda);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('compra',$this->compra);
		$criteria->compare('venta',$this->venta);
		$criteria->compare('id_sede',$this->id_sede);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}