<?php

/**
 * This is the model class for table "cotizacion_filtros".
 *
 * The followings are the available columns in table 'cotizacion_filtros':
 * @property integer $id_cotizacion
 * @property integer $id_lente
 * @property integer $id_filtro
 */
class CotizacionFiltros extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CotizacionFiltros the static model class
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
		return 'cotizacion_filtros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_cotizacion, id_filtro', 'required'),
			array('id_cotizacion, id_filtro', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cotizacion, id_filtro', 'safe', 'on'=>'search'),
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
                    'idFiltro0' => array(self::BELONGS_TO, 'Filtro', 'id_filtro'),
                    'idCotizacion0' => array(self::BELONGS_TO, 'Cotizacion', 'id_cotizacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cotizacion' => 'Id Cotizacion',
			'id_filtro' => 'Id Filtro',
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

		$criteria->compare('id_cotizacion',$this->id_cotizacion);
		$criteria->compare('id_filtro',$this->id_filtro);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}