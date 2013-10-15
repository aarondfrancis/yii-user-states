yii-user-states
===============

A simple extension to the User component so you can get/set bits of data and store them in the session.

Set up your allowed data in User.php

````
private $_sessionKeys = array(
  'hairColor'
);
````

````
//	Usage: 

// set a piece of data
\Yii::$app->user->hairColor = "blonde";
echo \Yii::$app->user->hairColor;

// throws an error because the key is not present
\Yii::$app->user->eyeColor = "blue";

````
