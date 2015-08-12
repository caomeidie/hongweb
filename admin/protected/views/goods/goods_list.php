<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<form id="pagerForm" method="post" action="?r=goods/index">
	<input type="hidden" name="status" value="${param.status}">
	<input type="hidden" name="keywords" value="${param.keywords}" />
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo $pagination['perpage']; ?>" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
</form>
<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="?r=goods/index" method="post">
	<div class="searchBar">
	    <table class="searchContent">
			<tr>
				<td>
					商品名称：<input type="text" name="keyword" />
				</td>
				<td>
					<select class="combox" name="province">
						<option value="">所有状态</option>
						<option value="1">正常</option>
						<option value="0">违规</option>
					</select>
				</td>
				<td>
					添加日期：<input type="text" class="date" readonly="true" />
				</td>
			</tr>
		</table>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
				<li><a class="button" href="demo_page6.html" target="dialog" mask="true" title="查询框"><span>高级检索</span></a></li>
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
		    <li><a class="all edit"><span>全选</span></a></li>
			<li><a class="add" href="?r=goods/add" target="navTab"><span>添加</span></a></li>
			<li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="check" postType="string" href="?r=goods/del" class="delete"><span>删除</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
			    <th width="40"></th>
				<th width="40">id</th>
				<th>商品名</th>
				<th width="100">所属分类</th>
				<th width="120">商品图片</th>
				<th width="120">商品价格</th>
				<th width="80">商品库存</th>
				<th width="60">上架</th>
				<th width="40">状态</th>
				<th width="40">推荐</th>
				<th width="130">添加时间</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($list as $value): ?>
    		<tr target="sid" rel="<?php echo $value['goods_id']; ?>">
    		    <td><label><input type="checkbox" name="check" value="<?php echo $value['goods_id']; ?>" /></label></td>
        		<td><?php echo $value['goods_id']; ?></td>
        		<td><?php echo $value['goods_name']; ?></td>
        		<td><?php echo $value['gc_name']; ?></td>
                <td><img src="<?php echo $value['goods_image']; ?>" height="30px;"/></td>
                <td><?php echo $value['goods_price']; ?></td>
                <td><?php echo $value['goods_storage']; ?></td>
                <td><?php if($value['goods_show'] == 1):?>是<?php else:?>否<?php endif;?></td>
                <td><?php if($value['goods_status'] == 1):?>正常<?php else:?>违规<?php endif;?></td>
                <td><?php if($value['goods_recommend'] == 1):?>是<?php else:?>否<?php endif;?></td>
                <td><?php echo date('Y-m-d H:i:s',$value['goods_add_time']); ?></td>
                <td>
                    <a title="删除" target="ajaxTodo" href="?r=goods/del&uid=<?php echo $value['goods_id']; ?>" class="btnDel">删除</a>
					<a title="编辑" target="navTab" href="?r=goods/edit&uid=<?php echo $value['goods_id']; ?>" class="btnEdit">编辑</a>
                </td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
			    <option value="2" <?php if($pagination['perpage']<=2): ?> selected <?php endif ?>>2</option>
				<option value="20" <?php if(2<$pagination['perpage'] && $pagination['perpage']<=20): ?> selected <?php endif ?>>20</option>
				<option value="50" <?php if(20<$pagination['perpage'] && $pagination['perpage']<=50): ?> selected <?php endif ?>>50</option>
				<option value="100" <?php if(50<$pagination['perpage'] && $pagination['perpage']<=100): ?> selected <?php endif ?>>100</option>
				<option value="200" <?php if(100<$pagination['perpage'] && $pagination['perpage']<=200): ?> selected <?php endif ?>>200</option>
			</select>
			<span>条，共<?php echo $pagination['count']; ?>条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="<?php echo $pagination['count']; ?>" numPerPage="<?php echo $pagination['perpage']; ?>" pageNumShown="<?php echo $pagination['pagenum']; ?>" currentPage="<?php echo $pagination['page']+1; ?>"></div>
	</div>
</div>
<script>
    var href = $("#delete").attr('href');
</script>