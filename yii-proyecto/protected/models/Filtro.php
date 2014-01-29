<?php

/**
 * This is the model class for table "filtro".
 *
 * The followings are the available columns in table 'filtro':
 * @property integer $id_filtro
 * @property string $nombre_filtro
 * @property string $caracteristicas
 *
 * The followings are the available model relations:
 * @property Cotizacion[] $cotizacions
 * @property Lente[] $lentes
 */
class Filtro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Filtro the static model class
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
		return 'filtro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_filtro, caracteristicas', 'required'),
			array('nombre_filtro', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_filtro, nombre_filtro, caracteristicas', 'safe', 'on'=>'search'),
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
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'id_filtro'),
			'lentes' => array(self::MANY_MANY, 'Lente', 'lentes_filtro(id_filtro, id_lente)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_filtro' => 'Id Filtro',
			'nombre_filtro' => 'Nombre Filtro',
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

		$criteria->compare('id_filtro',$this->id_filtro);
		$criteria->compare('nombre_filtro',$this->nombre_filtro,true);
		$criteria->compare('caracteristicas',$this->caracteristicas,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}