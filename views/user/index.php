<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\modules\user\models\User;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model, $key, $index, $grid)
        {
            /*if($model->status == false) {
                return ['style' => 'background-color:#778899;'];
            }*/
            return [ 'value' => \app\modules\user\models\User::getStatusesArray()[10]];
        },
        'filterModel' => $searchModel,
        //'filter' => ArrayHelper::map(User::getStatusesArray(), 'id', 'name'),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
            [
                'attribute' => 'status',
                'value' => function ($model) { return User::getStatusesArray()[$model->status]; },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d']
            ],
             'created_at',
             'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{permit}&nbsp;&nbsp;{delete}',
                'buttons' =>
                [
                    'permit' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-wrench"></span>', Url::to(['/permit/user/view', 'id' => $model->id]), [
                            'title' => Yii::t('yii', 'Change user role')
                        ]); },
                ]
            ],
        ],
    ]); ?>
</div>
