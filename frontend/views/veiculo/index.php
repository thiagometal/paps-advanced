<?php

use frontend\models\Veiculo;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\VeiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Veículos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="veiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="right">
        <?= Html::a('Novo Veículo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'renavam',
                    //'cidade',
                    //'chassi',
                    //'num_patrimonio',
                    //'lotacao',
                    // 'observacao',
                    // 'adquirido_de',
                    // 'uf_atual',
                    // 'uf_anterior',
                    'placa_atual',
                    // 'placa_anterior',
                    // 'potencia',
                    'id_modelo',
                    [
                        'attribute' => 'status',
                        'filter' => Html::activeDropDownList($searchModel, 'status', Veiculo::getStatus(),['class'=>'form-control','prompt'=>'Filtrar']),
                    ],
                    // 'id_cor',
                    // 'id_tipo_combustivel',
                    // 'ano_fabricacao',
                    // 'ano_modelo',

                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{visualizar}  {editar}  {excluir}',
                        'buttons' => [
                            'visualizar' => function($url,$model) {
                                return Html::a(
                                    '<span class="fa fa-eye"></span>',
                                    ['view', 'id' => $model->renavam],
                                    [
                                        //'class' => 'btn btn-default',
                                        'title' => 'Exibir',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                            'editar' => function($url,$model) {
                                return Html::a(
                                    '<span class="fa fa-pencil"></span>',
                                    ['update', 'id' => $model->renavam],
                                    [
                                        //'class' => 'btn btn-default',
                                        'title' => 'Alterar',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                            'excluir' => function($url,$model) {
                                return Html::a(
                                    '<span class="fa fa-trash"></span>',
                                    ['delete', 'id' => $model->renavam], [
                                        //'class' => 'btn btn-default',
                                        'title' => 'Excluir',
                                        'data-pjax' => '0',
                                        'data' => [
                                            'confirm' => 'Tem certeza de que deseja excluir este item?',
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
