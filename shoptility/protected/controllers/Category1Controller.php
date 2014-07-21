<?php

class Category1Controller extends Controller
{
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','updateAjax'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model from ajax request.
	 */
	public function actionCreate()
	{
		// create a blank model
		$model=new Category1;
		$model->active = 1;

		// If we have submitted values for this then lets save it
		if(isset($_POST['Category1']))
		{
			$model->attributes=$_POST['Category1'];
			if($model->save()){
				// if we have submitted new sub categories then lets save them
				if(isset($_POST['categories'])){
					$this->saveSubCategories($_POST['categories'],$model['id']);
				}
			}
			Yii::app()->end();
		}

		$this->renderPartial('_form', array('model'=>$model,'ajax'=>true));
	}

	/**
	 * Updates a particular model.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateAjax($id)
	{
		// load up the current model
		$model=$this->loadModel($id);

		// If we have submitted values for this then lets save it
		if(isset($_POST['Category1']))
		{
			$changingStatus = ($model['active'] != $_POST['Category1']['active']) ? true : false ;
			$model->attributes=$_POST['Category1'];
			if($model->save()){
				// if we have submitted new sub categories then lets save them
				if(isset($_POST['categories'])){
					$this->saveSubCategories($_POST['categories'],$id);
					
				}
				
				// if we are changing the status of category then we might need to act on the sub categories
				if ($changingStatus && (!$model['active'] || $model['active'] && (isset($_POST['activatesub']) && $_POST['activatesub']))) {
					$relatedCat2s = Category2::model()->findAll('category1_id=' . $id);
					$theAttributes = array('active'=>$model['active']);
					settype($theAttributes['active'],'integer');
					foreach ($relatedCat2s as $key => $relatedCat2) {
						$relatedCat2->attributes=$theAttributes;
						$saving = $relatedCat2->save();
					}
				}
				Yii::app()->end();
			}
				
		}

		$this->renderPartial('_form', array('model'=>$model,'ajax'=>true));
	}

	private function saveSubCategories($newSubCategories,$id){
		foreach ($newSubCategories as $key => $value) {
			$model2=Category2::model()->findByPk($value);
			if($model2!=null){
				$theAttributes = array('category1_id'=>$id);
				$model2->attributes=$theAttributes;
				$model2->save();
			}
		}		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		Yii::app()->end();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Category1 the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Category1::model()->with('category2s')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Category1 $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category1-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
