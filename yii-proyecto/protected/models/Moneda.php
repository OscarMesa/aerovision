<?php

/**
 * This is the model class for table "moneda".
 *
 * The followings are the available columns in table 'moneda':
 * @property integer $id_moneda
 * @property string $nombre_moneda
 * @property string $descripcion
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property Tasas[] $tasases
 */
class Moneda extends CActiveRecord
{
     public $image;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Moneda the static model class
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
		return 'moneda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_moneda', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombre_moneda', 'length', 'max'=>64),
			array('descripcion', 'safe'),
                        array('id_articulo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_moneda, nombre_moneda, descripcion, estado, id_articulo', 'safe', 'on'=>'search'),
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
			'tasases' => array(self::HAS_MANY, 'Tasas', 'id_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_moneda' => 'Id Moneda',
			'nombre_moneda' => 'Moneda',
			'descripcion' => 'Descripcion',
			'estado' => 'Estado',
                        'id_articulo' => 'Articulo',
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
		$criteria->compare('nombre_moneda',$this->nombre_moneda,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado);
                $criteria->compare('articulo',$this->id_articulo);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}