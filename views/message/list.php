<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\BackendUser;
use yii\helpers\HtmlPurifier;

/* @var $this yii\web\View */
/* @var $model app\models\Message */

$this->title = 'List';
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <h1><?php Html::encode($this->title) ?></h1>
	<ul>
    <?php
	foreach($messages as $message) {
		$c = "\"message\"";
		if (Yii::$app->user->identity->id == $message->creator_id)
			$c = "\"message my_message\"";
		//echo HTML::encode(BackendUser::findOne($message->creator_id)->username . " says: <br>" . $message->content . "<br>posted at: " . $message->timestamp . "<br><br>");

		//echo BackendUser::findOne($message->creator_id)->username . " says: <br>" . $message->content . "<br>posted at: " . $message->timestamp . "<br><br>";
		echo HtmlPurifier::process(Parsedown::instance()->text(BackendUser::findOne($message->creator_id)->username . " says: <br>" . $message->content . "<br>posted at: " . $message->timestamp . "<br><br>"));

		echo "<li class=" . $c . "><h5 class=\"username\">" . BackendUser::findOne($message->creator_id)->username . " says: </h5><div class=\"content\">" . $message->content . "</div><h6 class=\"timestamp\">posted at: " . $message->timestamp . "</h6></li>";

	}


 ?>
</ul>
</div>
