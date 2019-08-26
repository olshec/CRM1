<?php
use yii\helpers\Html;
?>
<?= Html::encode($message) ;

//var_dump(Yii::$app->components);

Yii::$app->mailer->compose() // a view rendering result becomes the message body here
    ->setFrom('user1@3520025571.com')
    ->setTo('olshec@gmail.com')
    ->setSubject('Message subject')
    ->send();


?>