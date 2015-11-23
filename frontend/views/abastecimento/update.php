<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Abastecimento */

$this->title = 'Atualizar Abastecimento: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Abastecimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="abastecimento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
