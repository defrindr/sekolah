<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use slavkovrn\lightbox\LightBoxWidget;

use kartik\grid\GridView;

$this->title = "Galeri";
$this->params['breadcrumbs'][] = ["label"=>"Galeri","url"=>["/galeri"]];

?>

<div class="site-galeri">
	<div class="row">
		<div class="col-sm-8 col-xs-12">
			<div class="row">
				<?php 
				if(count($models) > 0){
					foreach ($models as $model) {
				?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
					<div class="card showModalButton card-shadow artikel">
						<?= Html::img(Url::base()."/uploaded/galeri/".$model->link, ['class'=>'img img-responsive img-galeri showModalButton','onclick'=>'prevImages(this)','alt' => $model->judul]) ?>
						<div class="card-caption hidden" style="z-index: 1">
							<?= $model->judul ?>
						</div>
					</div>
				</div>
				<?php }
				} else {
					echo "Belum Ada Gambar.";
				} ?>
				
				
			</div>
			<center>
				<?= LinkPager::widget(['pagination'=>$pages,'hideOnSinglePage'=>true]) ?>
			</center>
		</div>
		<div class="col-sm-4 col-xs-10 col-xs-offset-1 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<div class="kategori">
				<h4 class="kategori-title">
					Galeri Kategori
				</h4>
				<?php foreach ($kategories as $kategori) { ?>
						<li><?= Html::a($kategori->nama,Url::to(['/galeri','kategori'=>$kategori->id])) ?></li>
				<?php } ?>
			</div>
		</div>
	</div>
</div>