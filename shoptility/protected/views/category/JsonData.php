<?php

//var_dump($allCategories);

$columns = array(
			'name'=>array('index'=>1,'type'=>'string','tooltip'=>'Name of the Category'),
			'price'=>array('index'=>2,'type'=>'number','decimals'=>2,'tooltip'=>'Price for the Category'),
			'status'=>array('index'=>3,'type'=>'bool','tooltip'=>'Whether the category is enabled or not'),
			'state'=>array('index'=>4,'type'=>'bool','tooltip'=>'Whether the category has sub categories assigned to it'),
			'primary level category name'=>array('index'=>5,'type'=>'string','tooltip'=>'Name of parent category'),
			'id'=>array('index'=>6,'type'=>'string','sorting'=>false,'filter'=>false,'format'=>'<div class="actions_cat_{0}"><a href="" title="edit" class="modify_category" data-action="edit"><span class="glyphicon glyphicon-edit" data-action="edit"></span></a><a href="" title="delete" class="modify_category" data-action="delete"><span class="glyphicon glyphicon-remove" data-action="delete"></span></a></div>','friendly'=>'action'),
			'uniqueid'=>array('hidden'=>true,'type'=>'number','unique'=>true),
			'level'=>array('hidden'=>true,'type'=>'number')
			);

/*
foreach ($allCategories as $key => $category1) {
	$rows[] = array(
		'id'=>$category1['id'],
		'name'=>$category1['name'],
		'price'=>$category1['price'],
		'status'=>false,
		'state'=>true,
		'primary level category name'=>''
	);
}
*/

//$rows[] = array('id'=>2,'name'=>'Cat2','price'=>10,'status'=>false,'state'=>true,'primary level category name'=>'');

$data = array('rows'=>$categoryArray,'cols'=>$columns);


/*
    cols: {
      userId: {
        index: 1,
        type: "number"
      },
      name: {
        index: 2,
        type: "string"
      }
    },
    rows: [
      {
        userId: 1,
        name: "Batman"
      },
      {
        userId: 2,
        name: "Superman"
      }
    ]
   */


$jsonData = json_encode($data);
echo $jsonData; die();

?>
