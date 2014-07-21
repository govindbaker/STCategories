<?php

class CategoryController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * gets all the JSON data required by Watable
	 */
	public function actionJsonData()
	{
		// are we getting cat1s, cat2s or both?
		$type = (isset($_GET["type"])) ? $_GET["type"] : 'show_cat1';
		if ($type == 'show_cat2') {
			$allCategories=Category2::model()->with('category1')->findAll();
		} else {
			$allCategories=Category1::model()->with('category2s')->findAll();
		}

		$categoryArray = array();

		// loop through the categories and build up the data object to matc the columns required in the table display
		foreach ($allCategories as $cat1_key => $category) {
			if($type == 'show_cat2'){
				$state = false;
				$price = (isset($category['category1']['price'])) ? $category['category1']['price'] : 0 ;
				$primary = (isset($category['category1']['name'])) ? $category['category1']['name'] : '' ;
				$uniqueid = '2_' . $category['id'];
				$level = 2;
			} else {
				$state = (is_array($category->category2s) && sizeof($category->category2s)) ? true : false ;
				$price = $category['price'];
				$primary = '';
				$uniqueid = '1_' . $category['id'];
				$level = 1;
			}

			$active = $category['active'];
			settype($active,'boolean');

			$categoryArray[] = array(
				'id'=>$category['id'],
				'name'=>$category['name'],
				'price'=>$price,
				'status'=>$active,
				'state'=>$state,
				'primary level category name'=>$primary,
				'uniqueid'=>$uniqueid,
				'level'=>$level
			);
			if ($state && $type == 'show_all') {
				foreach ($category->category2s as $cat2_key => $category2) {

					$active2 = $category2['active'];
					settype($active2,'boolean');
					$uniqueid = '2_' . $category2['id'];

					$categoryArray[] = array(
						'id'=>$category2['id'],
						'name'=>$category2['name'],
						'price'=>$price,
						'status'=>$active2,
						'state'=>0,
						'primary level category name'=>$category['name'],
						'uniqueid'=>$uniqueid,
						'level'=>2
					);
				}			
			}
		}

		// render the data as JSON to return to Watable
		$this->renderPartial('JsonData',array('categoryArray'=>$categoryArray));
	}
}