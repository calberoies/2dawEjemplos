<?php
namespace app\components;
use Yii;
use yii\helpers\Html;
use kartik\typeahead\Typeahead;

use yii\helpers\Url;
use yii\widgets\ActiveForm;

class THtml {
	public static function autocomplete($model,$atributo,$lookupaction,$relation,$options=[]){
		if(!isset($options['id']))
			$id=Html::getInputId($model, $atributo);
		else
			$id=$options['id'];
		echo "<div class='form-group ".($model->getErrors($atributo)?'has-error':'')."'>";
		echo Html::activeHiddenInput($model,$atributo,['id'=>$id.'-hidden']);
		echo Html::activeLabel($model,$atributo);
		echo Typeahead::widget([
			'name' => $atributo.'_a',
			'value'=>$model->$relation,
			'options' => array_merge(['placeholder' => '...'],$options),
			'pluginOptions' => ['highlight'=>true],
			'pluginEvents' => [
				"typeahead:select" => 'function(ev, resp) {
					$("#'.$id.'-hidden").val(resp.id);
					$("#'.$id.'-hidden").change();
				}',
			],
			'dataset' => [
				[
					'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('id')",
					'display' => 'label',
				  //  'prefetch' => $baseUrl . '/samples/countries.json',
					'remote' => [
						'url' => Url::to(array_merge($lookupaction,['term'=>'XQY'])),
						'wildcard' => 'XQY'
					]
				]
			]
		]);
		echo Html::error($model,$atributo);
		echo '</div>';
	}
}