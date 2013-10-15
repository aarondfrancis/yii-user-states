<?php

/**
* @author Aaron Francis <aarondfrancis@gmail.com>
*
*	Usage: 
*
*	// set a piece of data
*	\Yii::$app->user->hairColor = "blonde";
*	echo \Yii::$app->user->hairColor;
*
*	// throws an error because the key is not present
*	\Yii::$app->user->eyeColor = "blue";
*
*/


namespace common\components;

class User extends \yii\web\User {
	private $_sessionKeys = array(
		'hairColor'
	);

	public function __get($name){
		try{
			return parent::__get($name);
		}catch (\yii\base\UnknownPropertyException $e){
			if(in_array($name, $this->_sessionKeys)){
				return \Yii::$app->session->get("user.$name");
			}else{
				throw $e;
			}
		}
	}

	public function __set($name, $value){
		try {
			parent::__set($name, $value);
		}catch (\yii\base\UnknownPropertyException $e){
			if(in_array($name, $this->_sessionKeys)){
				\Yii::$app->session->set("user.$name", $value);
			}else{
				throw $e;
			}
		}
	}
}