<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\grid\GridView;
use app\models\Comentarios;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = 'Entrada';
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entradas-view">

    <h2><?= Html::encode($this->title) ?></h2>

    <?php if($model->canupdate) {
        echo Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); 
        echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro?',
                'method' => 'post',
            ],
        ]);
        }    
    ?>
    </p>
    <div class=row>
        <?= DetailView::widget([
            'model' => $model,
            'template'=>'<div class="col-md-2"><b>{label}</b><br>{value}</div>',
            'attributes' => [
                'usuario',
                'fecha',
                'aprobadaText',
                'categoria',
            ],
        ]) ?>
    </div>
<?=$model->texto?>
</div>

<h3>Comentarios</h3>
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
                        'query'=>$model->getComentarios()->orderby('fecha'),
                        'pagination'=>['pageSize'=>6,]
                    ]),
        'columns' => [
            'fecha',
            'usuario.nombre',
            'texto',
            ['class' => 'yii\grid\ActionColumn',
                'visible'=>hasrole("A"),
                'urlCreator'=>function ($action,$model, $key,  $index) {
                    return Url::toRoute(['comentarios/'.$action,'id'=>$model->id]);
                }
            ],
 
        ],
    ]); ?>
    <label>Añadir comentario</label>
    <?php 
    $comentario=new Comentarios;
    $comentario->entradas_id=$model->id;
    echo $this->render('/comentarios/_form',['model'=>$comentario]);
    ?>
