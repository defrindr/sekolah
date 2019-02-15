<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\ModuleKelasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;use yii\helpers\Url;


$this->title = 'Module Kelas';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);

yii\bootstrap\Modal::begin([
'headerOptions' => ['id' => 'modalHeader'],
'id' => 'modal',
'size' => 'modal-lg',
/*'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]*/
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();

?>
<div class="module-kelas-index">
    <div class="box box-danger">
        <div class="box-header">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <p>
                    <?= Html::a('Tambah', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Pencarian', '#', ['class' => 'btn btn-info search-button']) ?>
                </p>
                <div class="search-form" style="display:none">
                    <?=  $this->render('_search', ['model' => $searchModel]); ?>
                </div>
        </div>
        <!-- end box header -->
        <div class="box-body">
            <?php 
                $gridColumn = [
                                ['class' => 'yii\grid\SerialColumn'],
                                ['attribute' => 'id', 'visible' => false],
                                [
                                    'attribute' => 'jurusan_id',
                                    'label' => 'Jurusan',
                                    'value' => function($model){
                                        return $model->jurusan->id;
                                    },
                                    'filterType' => GridView::FILTER_SELECT2,
                                    'filter' => \yii\helpers\ArrayHelper::map(\common\models\ModuleJurusan::find()->asArray()->all(), 'id', 'nama'),
                                    'filterWidgetOptions' => [
                                        'pluginOptions' => ['allowClear' => true],
                                    ],
                                    'filterInputOptions' => ['placeholder' => 'Module jurusan', 'id' => 'grid-module-kelas-search-jurusan_id']
                                ],
                                [
                                    'attribute' => 'guru_id',
                                    'label' => 'Guru',
                                    'value' => function($model){
                                        return $model->guru->user_id;
                                    },
                                    'filterType' => GridView::FILTER_SELECT2,
                                    'filter' => \yii\helpers\ArrayHelper::map(\common\models\ModuleGuru::find()->asArray()->all(), 'user_id', 'username'),
                                    'filterWidgetOptions' => [
                                        'pluginOptions' => ['allowClear' => true],
                                    ],
                                    'filterInputOptions' => ['placeholder' => 'Module guru', 'id' => 'grid-module-kelas-search-guru_id']
                                ],
                                'kelas',
                                'grade',
                                'tahun',
                                ['attribute' => 'lock', 'visible' => false],
                                [
                        'class' => 'yii\grid\ActionColumn',
                                ],
                            ]; 
                            ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
        'columns' => $gridColumn,
                    'pjax' => true,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-module-kelas']],
                    'panel' => false,
                ]); ?>
        </div>
    </div>

</div>