<?php
/* @var $this Category2Controller */
/* @var $model Category2 */
/* @var $form CActiveForm */

	$ajax = (isset($ajax)) ? $ajax : false ;
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category2-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'data-async'=>'true',
		'data-target'=>'#simpleModal',
		'data-postfunction'=>'update',
		'role'=>'form',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128,'class'=>'form-control','data-bv-notempty'=>'','data-bv-stringlength'=>'true','data-bv-stringlength-max'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category1_id'); ?>
		<?php echo $form->dropDownList($model,'category1_id', $category1s, array('empty' => '(Choose Top Level Category'));?>
		<?php echo $form->error($model,'category1_id'); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'active');*/ ?>
		<?php echo $form->radioButtonList($model,'active', array('1'=>'Enabled', '0'=>'Disabled')); ?>
	</div>

	<?php if (!$ajax) { ?>
		<div class="row buttons">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	<?php 	} ?>

<?php $this->endWidget(); ?>

</div><!-- form -->