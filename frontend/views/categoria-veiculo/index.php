<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CategoriaVeiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias de Veículos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova Categoria de Veículo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    'nome',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
      </div>
    </div>
</div>
