<!DOCTYPE html>
<html>
<head>
   <title></title>
    <!-- include js libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js" type="text/javascript"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.watable.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrapValidator.min.js" type="text/javascript"></script>

    <!-- include css libraries -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/main.css'/>
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/watable.css'/>
</head>
<body>
	<?php echo $content; ?>


    <!-- Generic Modal -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="simpleModalTitle">
                   
                </h4>
             </div>
             <div class="modal-body" id="simpleModalBody">
                
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                   Close
                </button>
                <button type="button" class="btn btn-primary" id="simpleModalSubmit">
                   Submit changes
                </button>
             </div>
          </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
</html>