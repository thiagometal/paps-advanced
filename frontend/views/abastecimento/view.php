<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Abastecimento */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Abastecimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abastecimento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="box box-primary">
        <div class="box-header with-border">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'preco_litro',
                    'id_posto',
                    'id_veiculo',
                    'km',
                    'data_lancamento',
                    'id_motorista',
                    'data_abastecimento',
                ],
            ]) ?>
        </div>
    </div>
</div>
