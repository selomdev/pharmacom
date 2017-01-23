<?php

/**
 * This is the model class for table "abonnement".
 *
 * The followings are the available columns in table 'abonnement':
 * @property integer $id_abonnement
 * @property string $dateExpire
 * @property integer $id_forfaiit
 * @property integer $id_pharm_id
 * @property string $date_abonnement
 * @property integer $sup_abonnement
 * @property integer $nbr_jourRest
 *
 * The followings are the available model relations:
 * @property Forfaiit $idForfaiit
 * @property PharmatieEnligne $idPharm
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
			array('id_abonnement, id_forfaiit, id_pharm_id', 'required'),
			array('id_abonnement, id_forfaiit, id_pharm_id, sup_abonnement, nbr_jourRest', 'numerical', 'integerOnly'=>true),
			array('dateExpire, date_abonnement', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_abonnement, dateExpire, id_forfaiit, id_pharm_id, date_abonnement, sup_abonnement, nbr_jourRest', 'safe', 'on'=>'search'),
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
			'idPharm' => array(self::BELONGS_TO, 'PharmatieEnligne', 'id_pharm_id'),
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
			'id_pharm_id' => 'Id Pharm',
			'date_abonnement' => 'Date Abonnement',
			'sup_abonnement' => 'Sup Abonnement',
			'nbr_jourRest' => 'Nbr Jour Rest',
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
		$criteria->compare('id_pharm_id',$this->id_pharm_id);
		$criteria->compare('date_abonnement',$this->date_abonnement,true);
		$criteria->compare('sup_abonnement',$this->sup_abonnement);
		$criteria->compare('nbr_jourRest',$this->nbr_jourRest);

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
