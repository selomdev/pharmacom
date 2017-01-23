<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $id_Stock
 * @property string $nom_prodLign
 * @property string $descrip_prodLign
 * @property string $famile_prodLign
 * @property integer $qte
 * @property string $date_c
 * @property integer $id_pharmatie
 *
 * The followings are the available model relations:
 * @property PharmatieEnligne $idPharmatie
 */
class Stock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'stock';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pharmatie', 'required'),
			array('qte, id_pharmatie', 'numerical', 'integerOnly'=>true),
			array('nom_prodLign, descrip_prodLign', 'length', 'max'=>255),
			array('famile_prodLign', 'length', 'max'=>150),
			array('date_c', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_Stock, nom_prodLign, descrip_prodLign, famile_prodLign, qte, date_c, id_pharmatie', 'safe', 'on'=>'search'),
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
			'idPharmatie' => array(self::BELONGS_TO, 'PharmatieEnligne', 'id_pharmatie'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_Stock' => 'Id Stock',
			'nom_prodLign' => 'Nom Prod Lign',
			'descrip_prodLign' => 'Descrip Prod Lign',
			'famile_prodLign' => 'Famile Prod Lign',
			'qte' => 'Qte',
			'date_c' => 'Date C',
			'id_pharmatie' => 'Id Pharmatie',
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

		$criteria->compare('id_Stock',$this->id_Stock);
		$criteria->compare('nom_prodLign',$this->nom_prodLign,true);
		$criteria->compare('descrip_prodLign',$this->descrip_prodLign,true);
		$criteria->compare('famile_prodLign',$this->famile_prodLign,true);
		$criteria->compare('qte',$this->qte);
		$criteria->compare('date_c',$this->date_c,true);
		$criteria->compare('id_pharmatie',$this->id_pharmatie);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
