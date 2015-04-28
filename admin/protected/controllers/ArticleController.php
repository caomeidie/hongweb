<?php

class ArticleController extends UserBaseController
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionAdd()
	{
	    $model = new Article();
	    if(isset($_POST['ArticleForm']))
	    {
	        $model->article_title = $_POST['ArticleForm']['aname'];
	        $model->ac_id = $_POST['ArticleForm']['ac_id'];
	        $model->article_url = $_POST['ArticleForm']['url'];
	        $model->article_show = $_POST['ArticleForm']['isshow'];
	        $model->article_sort = $_POST['ArticleForm']['sort'];
	        $model->article_content = $_POST['ArticleForm']['content'];
	        $model->article_time = time();
	        if($model->addArticle()){
	            $result = $this->message("添加成功");
	        }else{
	            $result = $this->message("添加失败", "300");
	        }
	        echo $result;
	        exit;
	    }
	    $ac_model = new ArticleClass();
	    $ac = $ac_model->getAllAC();
	    $this->renderPartial('article_add',array('model'=>$model, 'ac'=>$ac));
	}
}