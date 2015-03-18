<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<form id="pagerForm" method="post" action="?r=users/index">
	<input type="hidden" name="status" value="${param.status}">
	<input type="hidden" name="keywords" value="${param.keywords}" />
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination['perpage']; ?>" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
</form>
<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="?r=users/index" method="post">
	<div class="searchBar">
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="demo_page4.html" target="navTab"><span>添加</span></a></li>
			<li><a class="delete" href="demo/common/ajaxDone.html?uid={sid_user}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="demo_page4.html?uid={sid_user}" target="navTab"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="80">id</th>
				<th width="120">用户名</th>
				<th>邮箱</th>
				<th width="100">手机</th>
				<th width="150">添加时间</th>
				<th width="150">最近更新时间</th>
				<th width="80">最近登录IP</th>
				<th width="80">状态</th>
				<th width="80">用户类型</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($list as $value): ?>
    		<tr target="sid_user" rel="1">
        		<td><?php echo $value['user_id']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo date('Y-m-d H:i:s', $value['addtime']); ?></td>
                <td><?php echo date('Y-m-d H:i:s', $value['updatetime']); ?></td>
                <td><?php echo $value['lastip']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['style_id']; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
			    <option value="2">2</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $pagination['count']; ?>条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination['count']; ?>" numPerPage="<?php echo $pagination['perpage']; ?>" pageNumShown="<?php echo $pagination['pagenum']; ?>" currentPage="<?php echo $pagination['page']+1; ?>"></div>
	</div>
</div>