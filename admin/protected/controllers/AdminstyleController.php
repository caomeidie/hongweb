<?php

class AdminstyleController extends UserBaseController
{
    
    public function actions()
    {
        return array(
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
    }
    
    public function actionIndex()
    {
        $adminstyle_model = new Adminstyle();
        $pagination['count'] = $adminstyle_model->stylesCount();
        $pagination['page'] = is_numeric(Yii::app()->request->getPost('pageNum')) ? Yii::app()->request->getPost('pageNum')-1 : 0;
        $pagination['perpage'] = is_numeric(Yii::app()->request->getPost('numPerPage')) ? Yii::app()->request->getPost('numPerPage') : 5;
        $pagination['pagenum'] = ceil($pagination['count'] / $pagination['perpage']);
        $pagination['offset'] = $pagination['page'] * $pagination['perpage'];
        $styles_list = $adminstyle_model->stylesList('style_id ASC', $pagination['perpage'], $pagination['offset']);
		$this->renderPartial('style_list', array('list'=>$styles_list, 'pagination'=>$pagination));
    }
    
    public function actionAdd()
    {
        $model = new AdminStyle();
        if(isset($_POST['StyleForm']))
        {
            $model->style_value = $_POST['StyleForm']['stylename'];
            $model->roles = $_POST['StyleForm']['roles'];
            if($model->addStyle()){
                $result = $this->message("添加成功");
            }else{
                $result = $this->message("添加失败", "300");
            }
            echo $result;
            exit;
        }
        $roles_model = new Roles();
        $roles = $roles_model->getAllRoles();
        $this->renderPartial('style_add',array('model'=>$model, 'roles'=>$roles));
    }
    
    public function actionDel()
    {
        $style_id = Yii::app()->request->getParam('check') ? Yii::app()->request->getParam('check') : Yii::app()->request->getParam('uid');
        $adminstyle_model = new Adminstyle();
        $style_arr = explode(',', $style_id);
        if(count($style_arr) <= 1){
            if($adminstyle_model->deleteByPk($style_id))
                $result = $this->message("删除成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }else{
            if($count = $adminstyle_model->deleteAll("style_id IN(".$style_id.")"))
                $result = $this->message("删除{$count}条成功", "200");
            else
                $result = $this->message("删除失败", "300");
        }
        echo $result;
    }
    
    public function actionEdit()
    {
        $style_id = Yii::app()->request->getParam('uid');
        
        if(isset($_POST['AdminStyle']))
        {
            $model=new AdminStyle();
            $model->style_id = $style_id;
            $model->style_value = $_POST['AdminStyle']['style_value'];
            $model->roles = $_POST['AdminStyle']['roles'];
            if($model->editStyle($style_id)){
                $result = $this->message("修改成功", "200");
            }else{
                $result = $this->message("修改失败", "300");
            }
            echo $result;
        }else{
            $model=new AdminStyle();
            $style_info = $model->findByPk($style_id);
            $roles_model = new Roles();
            $roles = $roles_model->getAllRoles();
            $this->renderPartial('style_edit',array('style'=>$style_info, 'roles'=>$roles));
        }
    }
}
?>
