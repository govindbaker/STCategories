<?php
/* @var $this Category2Controller */
/* @var $model Category2 */
?>

<?php
$list = CHtml::listData($model,'id', 'name');
?>

<div class="row rowrelative">
    <div class="rowfloat">
        <?php echo CHtml::dropDownList('categories[' . rand() . ']',0, $list,array('empty' => '(Select a category')); ?>
    </div>
 
    <div class="rowfloat">
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this); return false;'));?>
    </div>
</div>
