<?php

/**
 * This is the model class for table "forfaiit".
 *
 * The followings are the available columns in table 'forfaiit':
 * @property integer $id_forfaiit
 * @property string $nom_Forfait
 * @property integer $duree
 * @property double $montant
 *
 * The followings are the available model relations:
 * @property Abonnement[] $abonnements
 */
class Forfaiit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'forfaiit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('duree', 'numerical', 'integerOnly'=>true),
			array('montant', 'numerical'),
			array('nom_Forfait', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_forfaiit, nom_Forfait, duree, montant', 'safe', 'on'=>'search'),
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
			'abonnements' => array(self::HAS_MANY, 'Abonnement', 'id_forfaiit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_forfaiit' => 'Id Forfaiit',
			'nom_Forfait' => 'Nom Forfait',
			'duree' => 'Duree',
			'montant' => 'Montant',
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

		$criteria->compare('id_forfaiit',$this->id_forfaiit);
		$criteria->compare('nom_Forfait',$this->nom_Forfait,true);
		$criteria->compare('duree',$this->duree);
		$criteria->compare('montant',$this->montant);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Forfaiit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
