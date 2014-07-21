<?php

class Category2Controller extends Controller
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
				'actions'=>array('index','view','create','updateAjax','GetOrphanedAjax','removeCategoryLink'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		// create a blank model
		$model=new Category2;
		$model->active = 1;

		// If we have submitted values for this then lets save it
		if(isset($_POST['Category2']))
		{
			$model->attributes=$_POST['Category2'];
			if($model->save()){
				Yii::app()->end();
			}
		}

		// get a list of all the category1s so that we can assign this sub dept to its parent.
		$category1s = CHtml::listData(Category1::model()->findAll(), 'id', 'name');

		$this->renderPartial('_form', array('model'=>$model,'ajax'=>true,'category1s'=>$category1s));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateAjax($id)
	{
		$model=$this->loadModel($id);

		$this->performAjaxValidation($model);

		if(isset($_POST['Category2']))
		{
			$model->attributes=$_POST['Category2'];
			if($model->save()){
				Yii::app()->end();
			}
		}

		// get a list of all the category1s so that we can assign this sub dept to its parent.
		$category1s = CHtml::listData(Category1::model()->findAll(), 'id', 'name');

		$this->renderPartial('_form', array('model'=>$model,'ajax'=>true,'category1s'=>$category1s));
	}

	/**
	 * removes a link between category 2 and category 1
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionRemoveCategoryLink($id)
	{
		// load the model and overwrite the attributes so that category1_id is null
		$model=$this->loadModel($id);
		$theAttributes = array('category1_id'=>'');
		$model->attributes=$theAttributes;
		if($model->save()){
			Yii::app()->end();
		}
	}

	/**
	 * get all orphaned cat2s so that we assign them to a cat 1
	 */
	public function actionGetOrphanedAjax()
	{
		$model = Category2::model()->findAll('category1_id is null');
		// render the select containing all the sub categories
		$this->renderPartial('_selectbox', array('model'=>$model));
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
	 * @return Category2 the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Category2::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Category2 $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='category2-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
