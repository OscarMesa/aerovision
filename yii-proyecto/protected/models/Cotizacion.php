<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property integer $id_cotizacion
 * @property string $nombre_completo
 * @property string $edad
 * @property string $telefono
 * @property string $celular
 * @property string $direccion
 * @property string $ciudad
 * @property string $departamento
 * @property string $email
 * @property double $esfera_ojo_derecho
 * @property double $esfera_ojo_izquierdo
 * @property double $cilindro_ojo_derecho
 * @property double $cilindro_ojo_izquierdo
 * @property integer $eje_ojo_izquierdo
 * @property integer $eje_ojo_derecho
 * @property integer $adicion_derecho
 * @property integer $adicion_izquierdo
 * @property integer $distancia_pupilar
 * @property string $estado
 * @property integer $paso
 * @property integer $id_filtro
 * @property integer $id_material
 * @property integer $id_tipodelente
 *
 * The followings are the available model relations:
 * @property Lente $idTipodelente0
 * @property Filtro $idFiltro0
 * @property Material $idMaterial0
 */
class Cotizacion extends CActiveRecord
{
        public $id_tipo_diseno;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cotizacion the static model class
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
		return 'cotizacion';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_completo, edad, direccion, ciudad, departamento', 'required'),

                        array('esfera_ojo_derecho, esfera_ojo_izquierdo, cilindro_ojo_derecho, cilindro_ojo_izquierdo, eje_ojo_izquierdo, eje_ojo_derecho, distancia_pupilar', 'required', 'on'=>'update'),
			array('eje_ojo_izquierdo, eje_ojo_derecho, eje_ojo_izquierdo, eje_ojo_derecho, paso, id_filtro, id_material, id_tipodelente, id_diseno', 'numerical', 'integerOnly'=>true,  'on'=>'update'),
			array('esfera_ojo_derecho, esfera_ojo_izquierdo, cilindro_ojo_derecho, cilindro_ojo_izquierdo', 'numerical',  'on'=>'update'),
                        array('esfera_ojo_izquierdo, esfera_ojo_derecho', 'numerical', "min"=>'-20', "max"=>"20",  'on'=>'update'),
                        array('esfera_ojo_izquierdo, esfera_ojo_derecho, cilindro_ojo_derecho, cilindro_ojo_izquierdo, adicion_derecho, adicion_izquierdo ', 'isMultiple', 'multiple'=>'0.25', 'on'=>'update'),
                       
                        array('cilindro_ojo_derecho, cilindro_ojo_izquierdo', 'numerical', "min"=>'-8', "max"=>"-0.25",  'on'=>'update'),
                        array('eje_ojo_izquierdo, eje_ojo_derecho', 'numerical', "min"=>'-180', "max"=>"180",  'on'=>'update'),
                        array('adicion_izquierdo, adicion_derecho', 'numerical', "min"=>'0', "max"=>"3.5", 'on'=>'update'),     
                    
                        array('nombre_completo, direccion', 'length', 'max'=>255),
			array('edad', 'length', 'max'=>6),
			array('telefono, celular, ciudad, departamento', 'length', 'max'=>16),
			array('email', 'length', 'max'=>64, ),
                        array('email', 'email'),
			array('estado', 'length', 'max'=>11),
                        
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_cotizacion, nombre_completo, edad, telefono, celular, direccion, ciudad, departamento, email, esfera_ojo_derecho, esfera_ojo_izquierdo, cilindro_ojo_derecho, cilindro_ojo_izquierdo, eje_ojo_izquierdo, eje_ojo_derecho, adicion_derecho, adicion_izquierdo, distancia_pupilar, lente, estado', 'safe', 'on'=>'search'),
		);
	}

        public function isMultiple($attribute,$params)
        {
            $number = $this->$attribute;
            $multiple = $params["multiple"];
             $num = $number / $multiple; 
             $res = strstr($num, '.'); 
             if ($res == false) { 
                  $return = true; 
             } else { 
                  $return = false; 
                  $this->addError($attribute, 'Debe ser multiplo de 0.25');
             } 

             return $return; 
             /*
            if ($params['strength'] === self::WEAK)
                $pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';  
            elseif ($params['strength'] === self::STRONG)
                $pattern = '/^(?=.*\d(?=.*\d))(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';  

            if(!preg_match($pattern, $this->$attribute))
              * 
              */
              
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idTipodelente0' => array(self::BELONGS_TO, 'Lente', 'id_tipodelente'),
			'idFiltro0' => array(self::BELONGS_TO, 'Filtro', 'id_filtro'),
			'idMaterial0' => array(self::BELONGS_TO, 'Material', 'id_material'),
                        'idDiseno0' => array(self::BELONGS_TO, 'Diseno', 'id_diseno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cotizacion' => 'Id Cotizacion',
			'nombre_completo' => 'Nombre Completo',
			'edad' => 'Edad',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'direccion' => 'Direccion',
			'ciudad' => 'Ciudad',
			'departamento' => 'Departamento',
			'email' => 'Email',
			'esfera_ojo_derecho' => 'Esfera Ojo Derecho',
			'esfera_ojo_izquierdo' => 'Esfera Ojo Izquierdo',
			'cilindro_ojo_derecho' => 'Cilindro Ojo Derecho',
			'cilindro_ojo_izquierdo' => 'Cilindro Ojo Izquierdo',
			'eje_ojo_izquierdo' => 'Eje Ojo Izquierdo',
			'eje_ojo_derecho' => 'Eje Ojo Derecho',
			'adicion_derecho' => 'Adicion Derecho',
			'adicion_izquierdo' => 'Adicion Izquierdo',
			'distancia_pupilar' => 'Distancia Pupilar',
			'estado' => 'Estado',
			'paso' => 'Paso',
                        'id_diseno' => 'Diseño',
                        'id_tipo_diseno' => 'Tipo de Diseño',
			'id_filtro' => 'Filtro',
			'id_material' => 'Material',
			'id_tipodelente' => 'Tipo de Lente',
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
		$criteria->compare('nombre_completo',$this->nombre_completo,true);
		$criteria->compare('edad',$this->edad,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('departamento',$this->departamento,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('esfera_ojo_derecho',$this->esfera_ojo_derecho);
		$criteria->compare('esfera_ojo_izquierdo',$this->esfera_ojo_izquierdo);
		$criteria->compare('cilindro_ojo_derecho',$this->cilindro_ojo_derecho);
		$criteria->compare('cilindro_ojo_izquierdo',$this->cilindro_ojo_izquierdo);
		$criteria->compare('eje_ojo_izquierdo',$this->eje_ojo_izquierdo);
		$criteria->compare('eje_ojo_derecho',$this->eje_ojo_derecho);
		$criteria->compare('adicion_derecho',$this->adicion_derecho);
		$criteria->compare('adicion_izquierdo',$this->adicion_izquierdo);
		$criteria->compare('distancia_pupilar',$this->distancia_pupilar);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('paso',$this->paso);
		$criteria->compare('id_filtro',$this->id_filtro);
		$criteria->compare('id_material',$this->id_material);
		$criteria->compare('id_tipodelente',$this->id_tipodelente);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}