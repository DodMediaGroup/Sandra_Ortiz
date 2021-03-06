<?php

/**
 * This is the model class for table "equipo".
 *
 * The followings are the available columns in table 'equipo':
 * @property integer $id
 * @property string $nombre
 * @property string $cargo
 * @property string $descripcion
 * @property string $imagen
 * @property string $correo
 * @property integer $estado
 */
class Equipo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'equipo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, cargo, descripcion, imagen, correo', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombre, cargo, correo', 'length', 'max'=>250),
			array('imagen', 'length', 'max'=>65),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, cargo, descripcion, imagen, correo, estado', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nombre' => 'Nombre',
			'cargo' => 'Cargo',
			'descripcion' => 'Descripcion',
			'imagen' => 'Imagen',
			'correo' => 'Correo',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Equipo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
