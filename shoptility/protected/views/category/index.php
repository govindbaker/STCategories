
<div id="div1" style="width:auto"></div>

<script type="text/javascript">
    $(document).ready( function() {

        //An example with all options.
         var waTable = $('#div1').WATable({
            debug:true,                 //Prints some debug info to console
            pageSize: 20,                //Initial pagesize
            //transition: 'slide',       //Type of transition when paging (bounce, fade, flip, rotate, scroll, slide).Requires https://github.com/daneden/animate.css.
            //transitionDuration: 0.2,    //Duration of transition in seconds.
            filter: true,               //Show filter fields
            sorting: true,              //Enable sorting
            //sortEmptyLast:true,         //Empty values will be shown last
            //columnPicker: true,         //Show the columnPicker button
            pageSizes: [20,50,100,200,500],  //Set custom pageSizes. Leave empty array to hide button.
            hidePagerOnEmpty: true,     //Removes the pager if data is empty.
            //checkboxes: true,           //Make rows checkable. (Note. You need a column with the 'unique' property)
            //checkAllToggle:true,        //Show the check-all toggle
            preFill: true,              //Initially fills the table with empty rows (as many as the pagesize).
            //url: '/someWebservice'    //Url to a webservice if not setting data manually as we do in this example
            //urlData: { report:1 }     //Any data you need to pass to the webservice
            //urlPost: true             //Use POST httpmethod to webservice. Default is GET.
            types: {                    //Following are some specific properties related to the data types
                string: {
                    //filterTooltip: "Giggedi..."    //What to say in tooltip when hoovering filter fields. Set false to remove.
                    //placeHolder: "Type here..."    //What to say in placeholder filter fields. Set false for empty.
                },
                number: {
                    decimals: 1   //Sets decimal precision for float types
                },
                bool: {
                    //filterTooltip: false
                }
            },
            actions: {                //This generates a button where you can add elements.
                custom: [
                    $('<a href="#" class="show_option" id="show_cat1"><span class="glyphicon glyphicon-arrow-up"></span>&nbsp;Show Main</a>'),
                    $('<a href="#" class="show_option" id="show_cat2"><span class="glyphicon glyphicon-arrow-down"></span>&nbsp;Show Sub</a>'),
                    $('<a href="#" class="show_option" id="show_all"><span class="glyphicon glyphicon-resize-vertical"></span>&nbsp;Show All</a>'),
                    $('<a href="#" class="show_option" id="add_category1"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Top Category</a>'),
                    $('<a href="#" class="show_option" id="add_category2"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Add Sub Category</a>')
                ]
            },
            rowClicked: myRowHandler,
            url:'<?php echo Yii::app()->createUrl("category/JsonData") ?>',
        }).data('WATable');  //This step reaches into the html data property to get the actual WATable object. Important if you want a reference to it as we want here.

		function myRowHandler(data){
			action = $(this).data( "action" );

			theName = data.row.name;
			if(action == 'edit'){
				jQuery.ajax({'success':function(data){
						$("#simpleModalBody").html(data);
						$("#simpleModalTitle").html("Edit Category: " + theName);
						//$("#question-form-submit").hide();
						$("#simpleModal").modal("show");
					},
					'url':'<?php echo Yii::app()->createUrl("category") ?>' + data.row.level + '/updateAjax?id=' + data.row.id,
					'cache':false
				});
			} else if (action == 'delete') {
				if (data.row.level == 1) {
					bodyText = 'This will delete the category and ALL sub categories.';
				} else {
					bodyText = 'Are you sure?';
				}
				$("#simpleModalBody").html(bodyText + "<form data-target='#simpleModal' action='<?php echo Yii::app()->createUrl("category") ?>" + data.row.level + "/delete?id=" + data.row.id + "&amp;_=" + Math.random() + "' method='post'></form>");
				$("#simpleModalTitle").html("Delete category: " + theName + "?");
				$("#simpleModal").modal("show");
			}
			event.preventDefault();
		}

        $('body').on('click', '.show_option', function (e) {
            e.preventDefault();
            if($(this).prop('id') == 'add_category1' || $(this).prop('id') == 'add_category2'){
				jQuery.ajax({'success':function(data){
						$("#simpleModalBody").html(data);
						$("#simpleModalTitle").html("Add Category");
						$("#simpleModal").modal("show");
					},
					'url':'<?php echo Yii::app()->createUrl("category") ?>' + $(this).prop('id').substr($(this).prop('id').length - 1) + '/create',
					'cache':false
				});
            } else {
	            waTable.option('urlData', { type: $(this).prop('id') });
    	        waTable.update('skipCols', true);
    	    }
        });

		$('#simpleModal').on('hidden.bs.modal', function () {
			$('#simpleModalBody').html('');$('#simpleModalTitle').html('');
		});

		$('#simpleModalSubmit').on('click', function () {
			var $form = $('form', '#simpleModalBody');
			$form.bootstrapValidator();
			$form.data('bootstrapValidator').validate();

			if($form.data('bootstrapValidator').isValid()){
				$.ajax({
					type: $form.attr('method'),
					url: $form.attr('action'),
					data: $form.serialize(),

					success: function(data, status) {
						waTable.update('skipCols', true);
						$('#simpleModal').modal('hide');
					}
				});
			}
			event.preventDefault();
		});
    });

	function deleteChild(elm, category2_id)
	{
		if (typeof category2_id === 'undefined') {
		} else {
			var _url = '<?php echo Yii::app()->createUrl("category2/removeCategoryLink") ?>?id=' + category2_id;
			$.ajax({
				url: _url,
				success:function(response){
				}
			});
		}

		element=$(elm).parent().parent();
		/* animate div */
		$(element).animate(
		{
			opacity: 0.25, 
			left: '+=50', 
			height: 'toggle'
		}, 500,
		function() {
			/* remove div */
			$(element).remove();
		});
	}

	$('body').on('click', '#loadChildByAjax', function (){
		event.preventDefault();
		var _url = '<?php echo Yii::app()->createUrl("category2/GetOrphanedAjax") ?>';
		$.ajax({
			url: _url,
			success:function(response){
				$("#children").append(response);
				$("#children .crow").last().animate({
					opacity : 1, 
					left: "+50", 
					height: "toggle"
				});
			}
		});
	});
</script>