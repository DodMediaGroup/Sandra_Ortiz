<?php

/**
 * This is the model class for table "rendicion_cuentas".
 *
 * The followings are the available columns in table 'rendicion_cuentas':
 * @property integer $id
 * @property string $titulo
 * @property string $tipo
 * @property integer $categoria
 * @property string $contenido
 * @property string $archivo
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property RendicionCuentasCategorias $categoria0
 */
class RendicionCuentas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rendicion_cuentas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, tipo, categoria', 'required'),
			array('categoria, estado', 'numerical', 'integerOnly'=>true),
			array('titulo, tipo, archivo', 'length', 'max'=>255),
			array('contenido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, tipo, categoria, contenido, archivo, estado', 'safe', 'on'=>'search'),
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
			'categoria0' => array(self::BELONGS_TO, 'RendicionCuentasCategorias', 'categoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'tipo' => 'Tipo',
			'categoria' => 'Categoria',
			'contenido' => 'Contenido',
			'archivo' => 'Archivo',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('categoria',$this->categoria);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('archivo',$this->archivo,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RendicionCuentas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
