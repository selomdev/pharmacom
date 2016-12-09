<?php

/**
 * This is the model class for table "abonnement".
 *
 * The followings are the available columns in table 'abonnement':
 * @property integer $id_abonnement
 * @property string $dateExpire
 * @property integer $id_forfaiit
 *
 * The followings are the available model relations:
 * @property Forfaiit $idForfaiit
 * @property PharmatieEnligne[] $pharmatieEnlignes
 */
class Abonnement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'abonnement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_abonnement, id_forfaiit', 'required'),
			array('id_abonnement, id_forfaiit', 'numerical', 'integerOnly'=>true),
			array('dateExpire', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_abonnement, dateExpire, id_forfaiit', 'safe', 'on'=>'search'),
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
			'idForfaiit' => array(self::BELONGS_TO, 'Forfaiit', 'id_forfaiit'),
			'pharmatieEnlignes' => array(self::MANY_MANY, 'PharmatieEnligne', 'abonnement_pharmatie(id_abonnement, id_pharmatie)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_abonnement' => 'Id Abonnement',
			'dateExpire' => 'Date Expire',
			'id_forfaiit' => 'Id Forfaiit',
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

		$criteria->compare('id_abonnement',$this->id_abonnement);
		$criteria->compare('dateExpire',$this->dateExpire,true);
		$criteria->compare('id_forfaiit',$this->id_forfaiit);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Abonnement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
