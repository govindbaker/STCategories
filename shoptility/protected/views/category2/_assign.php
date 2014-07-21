<div class="row rowrelative">
    <div class="rowfloat">
        <?php echo $model['name'];?>
    </div>
 
    <div class="rowfloat">
        <?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteChild(this, ' . $model['id'] . '); return false;'));?>
    </div>
</div>