<?php

/**
 * This is the model class for table "pharmatie_enligne".
 *
 * The followings are the available columns in table 'pharmatie_enligne':
 * @property integer $id
 * @property string $nom_pharmaLign
 * @property string $tel1
 * @property string $tel2
 * @property string $email1
 * @property string $email2
 * @property string $Nom_diri
 * @property string $tel1_dir
 * @property string $tel2_dir
 * @property string $email1_dir
 * @property string $email2_dir
 * @property double $Latitude
 * @property double $Longitude
 * @property string $DeGarde
 * @property integer $BoolSupp
 *
 * The followings are the available model relations:
 * @property Abonnement[] $abonnements
 * @property Contactlign[] $contactligns
 * @property Stock[] $stocks
 */
class PharmatieEnligne extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pharmatie_enligne';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BoolSupp', 'numerical', 'integerOnly'=>true),
			array('Latitude, Longitude', 'numerical'),
			array('nom_pharmaLign, email1, email2, Nom_diri, email1_dir, email2_dir', 'length', 'max'=>255),
			array('tel1, tel2, tel1_dir, tel2_dir, DeGarde', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nom_pharmaLign, tel1, tel2, email1, email2, Nom_diri, tel1_dir, tel2_dir, email1_dir, email2_dir, Latitude, Longitude, DeGarde, BoolSupp', 'safe', 'on'=>'search'),
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
			'abonnements' => array(self::MANY_MANY, 'Abonnement', 'abonnement_pharmatie(id_pharmatie, id_abonnement)'),
			'contactligns' => array(self::HAS_MANY, 'Contactlign', 'id_pharmatie'),
			'stocks' => array(self::HAS_MANY, 'Stock', 'id_pharmatie'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nom_pharmaLign' => 'Nom Pharma Lign',
			'tel1' => 'Téléphone 1',
			'tel2' => 'Téléphone 2',
			'email1' => 'Email 1',
			'email2' => 'Email 2',
			'Nom_diri' => 'Nom Diri',
			'tel1_dir' => 'Téléphone 1 Dir',
			'tel2_dir' => 'Téléphone 2 Dir',
			'email1_dir' => 'Email 1 Dir',
			'email2_dir' => 'Email 2 Dir',
			'Latitude' => 'Latitude',
			'Longitude' => 'Longitude',
			'DeGarde' => 'De Garde',
			'BoolSupp' => 'Supprimée',
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
		$criteria->compare('nom_pharmaLign',$this->nom_pharmaLign,true);
		$criteria->compare('tel1',$this->tel1,true);
		$criteria->compare('tel2',$this->tel2,true);
		$criteria->compare('email1',$this->email1,true);
		$criteria->compare('email2',$this->email2,true);
		$criteria->compare('Nom_diri',$this->Nom_diri,true);
		$criteria->compare('tel1_dir',$this->tel1_dir,true);
		$criteria->compare('tel2_dir',$this->tel2_dir,true);
		$criteria->compare('email1_dir',$this->email1_dir,true);
		$criteria->compare('email2_dir',$this->email2_dir,true);
		$criteria->compare('Latitude',$this->Latitude);
		$criteria->compare('Longitude',$this->Longitude);
		$criteria->compare('DeGarde',$this->DeGarde,true);
		$criteria->compare('BoolSupp',$this->BoolSupp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PharmatieEnligne the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
