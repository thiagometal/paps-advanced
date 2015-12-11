<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PostoAbastecimento */

$this->title =  "Visualizar Posto de Abastecimento";
$this->params['breadcrumbs'][] = ['label' => 'Posto de Abastecimento', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posto-abastecimento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p align="right">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja apagar esse Posto de Abastecimento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="box box-primary">
        <div class="box-header with-border">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'nome',
                    'endereco',
                ],
            ]) ?>
        </div>
    </div>
</div>
