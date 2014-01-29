<?php

/**
 * This is the model class for table "lente".
 *
 * The followings are the available columns in table 'lente':
 * @property integer $id_lente
 * @property integer $id_diseno
 * @property integer $id_material
 * @property integer $id_tipodelente
 * @property integer $precio_terminado
 * @property string $esfera_limite_inferior
 * @property string $esfera_limite_superior
 * @property string $cilindro_limite_superior
 * @property string $cilindro_limite_inferior
 * @property integer $precio_tallado
 *
 * The followings are the available model relations:
 * @property Tipodelente $idTipodelente0
 * @property Diseno $idDiseno0
 * @property Material $idMaterial0
 */
class Lente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lente the static model class
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
		return 'lente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_diseno, id_material, id_tipodelente, precio_terminado, esfera_limite_inferior, esfera_limite_superior, cilindro_limite_superior, cilindro_limite_inferior, precio_tallado', 'required'),
			array('id_diseno, id_material, id_tipodelente, precio_terminado, precio_tallado', 'numerical', 'integerOnly'=>true),
			array('esfera_limite_inferior, esfera_limite_superior, cilindro_limite_superior, cilindro_limite_inferior', 'length', 'max'=>10),
			array('esfera_limite_inferior', 'compare', 'compareAttribute'=>'esfera_limite_superior', 'operator'=>'<', 'message'=>"{attribute} debe ser menor que {compareAttribute}"),
                        array('cilindro_limite_inferior', 'compare', 'compareAttribute'=>'cilindro_limite_superior', 'operator'=>'>=', 'message'=>"{attribute} debe ser menos negativo que {compareAttribute}"),
                        array('cilindro_limite_inferior, cilindro_limite_superior', 'numerical', "min"=>'-8', "max"=>"0",),    
                        array('id_lente, id_filtro', 'required', 'on'=>'agregarFiltro'),

                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_lente, id_diseno, id_material, id_tipodelente, precio_terminado, esfera_limite_inferior, esfera_limite_superior, cilindro_limite_superior, cilindro_limite_inferior, precio_tallado', 'safe', 'on'=>'search'),
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
			'idTipodelente0' => array(self::BELONGS_TO, 'Tipodelente', 'id_tipodelente'),
			'idDiseno0' => array(self::BELONGS_TO, 'Diseno', 'id_diseno'),
			'idMaterial0' => array(self::BELONGS_TO, 'Material', 'id_material'),
			'idTipodelente0' => array(self::BELONGS_TO, 'Tipodelente', 'id_tipodelente'),
			'filtros' => array(self::MANY_MANY, 'Filtro', 'lentes_filtro(id_lente, id_filtro)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_lente' => 'ID lente',
			'id_diseno' => 'Diseno',
			'id_material' => 'Material',
			'id_tipodelente' => 'Tipo de Lente',
			'precio_terminado' => 'Precio Terminado',
			'esfera_limite_inferior' => 'Limite inferior de la Esfera',
			'esfera_limite_superior' => 'Limite superior de la Esfera',
			'cilindro_limite_superior' => 'Limite superior del cilindro',
			'cilindro_limite_inferior' => 'Limite inferior del cilindro',
			'precio_tallado' => 'Precio Tallado',
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

		$criteria->compare('id_lente',$this->id_lente);
		$criteria->compare('id_diseno',$this->id_diseno);
		$criteria->compare('id_material',$this->id_material);
		$criteria->compare('id_tipodelente',$this->id_tipodelente);
		$criteria->compare('precio_terminado',$this->precio_terminado);
		$criteria->compare('esfera_limite_inferior',$this->esfera_limite_inferior,true);
		$criteria->compare('esfera_limite_superior',$this->esfera_limite_superior,true);
		$criteria->compare('cilindro_limite_superior',$this->cilindro_limite_superior,true);
		$criteria->compare('cilindro_limite_inferior',$this->cilindro_limite_inferior,true);
		$criteria->compare('precio_tallado',$this->precio_tallado);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}