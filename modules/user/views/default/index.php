<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\modules\user\models\User;
use yii\helpers\ArrayHelper;
use app\common\components\grid\SetColumn;
use kartik\date\DatePicker;
use app\common\components\grid\LinkColumn;

/* @var $this yii\web\View */
/* @var $searchModel \app\modules\user\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'filterModel' => $searchModel,
        //'filter' => ArrayHelper::map(User::getStatusesArray(), 'id', 'name'),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'class' => LinkColumn::className(),
                'attribute' => 'username',
            ],
             'email:email',

            [
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    //'attribute2' => 'date_to',
                    'type' => DatePicker::TYPE_INPUT,
                    'separator' => '-',
                    'pluginOptions' => ['format' => 'yyyy-mm-dd']
                ]),
                'attribute' => 'created_at',
                'format' => 'datetime',
            ],
            [
                'class' => SetColumn::className(),
                'filter' => User::getStatusesArray(),
                'attribute' => 'status',
                'name' => 'statusName',
                'cssCLasses' => [
                    User::STATUS_ACTIVE => 'success',
                    User::STATUS_BLOCKED => 'default',
                ],
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}&nbsp;&nbsp;{permit}&nbsp;&nbsp;{delete}',
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
