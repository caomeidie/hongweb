<?php

class ArticleController extends UserBaseController
{
	public function actionIndex()
	{
		$model = new Article();
        $pagination['count'] = $model->articleCount();
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $list = $model->articleList('article_sort DESC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('article_list', array('list'=>$list, 'pagination'=>$pagination));
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
	
	public function actionDel()
	{
	    $article_id = Yii::app()->request->getParam('check');
	    $model = new Article();
	    $article_arr = explode(',', $article_id);
	    if(count($article_arr) <= 1){
	        if($model->deleteByPk($article_id))
	            $result = $this->message("删除成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }else{
	        if($count = $model->deleteAll("article_id IN(".$article_id.")"))
	            $result = $this->message("删除{$count}条成功", "200");
	        else
	            $result = $this->message("删除失败", "300");
	    }
	    echo $result;
	}
	
	public function actionEdit()
	{
	    $article_id = Yii::app()->request->getParam('sid');
	    $model=new Article();
	
	    if(isset($_POST['ArticleForm']))
	    {
	        $model->article_id = $article_id;
	        $model->article_title = $_POST['ArticleForm']['aname'];
	        $model->ac_id = $_POST['ArticleForm']['ac_id'];
	        $model->article_url = $_POST['ArticleForm']['url'];
	        $model->article_show = $_POST['ArticleForm']['isshow'];
	        $model->article_sort = $_POST['ArticleForm']['sort'];
	        $model->article_content = $_POST['ArticleForm']['content'];
	        $model->article_time = time();
	        if($model->updateByPk($article_id, $model->attributes)){
	            $result = $this->message("修改成功", "200");
	        }else{
	            $result = $this->message("修改失败", "300");
	        }
	        echo $result;
	    }else{
	        $ac_model=new ArticleClass();
	        $ac = $ac_model->getAllAC();
	        $article_info = $model->findByPk($article_id);
	        $this->renderPartial('article_edit',array('article_info'=>$article_info, 'ac'=>$ac));
	    }
	}
}