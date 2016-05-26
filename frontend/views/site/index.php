<?php

/* @var $this yii\web\View */

$this->title = '接口调试工具';
?>
<div class="row">
  <!-- 右边 -->
  <div class="col-xs-12 col-md-9" style="border:1px;-moz-box-shadow: 10px 10px 5px #888888; /* 老的 Firefox */box-shadow: 2px 5px 8px #888888;">
       	
       	<div class="form-group" style="margin-top:10px;height: 35px;">
       	    <label for="inputPassword" class="col-sm-2 control-label" style="padding-right:0px;">
       	    	<select class="form-control">
       	    		<option value="">get</option>
       	    		<option value="">post</option>
       	    	</select>
       	    </label>
       	    <div class="col-sm-10">
       	      <input type="text" class="form-control" id="inputPassword" placeholder="http://">
       	      <button type="button" class="btn btn-success">提交</button>
       	    </div>
       	  </div>

       	  <table class="table table-bordered" style="margin-top:10px;">
       	    	<tr>
       	    		<td>参数名称</td>
       	    		<td>参数值</td>
       	    	</tr>
       	    	<tr>
       	    		<td><input type="text" class="form-control" id="exampleInputEmail1" placeholder="参数名称"></td>
       	    		<td><input type="text" class="form-control" id="exampleInputEmail1" placeholder="参数值" style="float:left;width:430px;margin: 0 10px 0 0;">
       	    		<button type="button" class="btn btn-danger">删除参数</button></td>
       	    	</tr>
       	    	<tr>
       	    		<td colspan="2"><button type="button" class="btn btn-primary">添加参数</button></td>
       	    		<!-- <td>ss</td> -->
       	    	</tr>
       	  </table>

       	  <div class="panel panel-default">
       	    <div class="panel-heading">返回结果：</div>
       	    <div class="panel-body" style="height:250px;">
       	      Panel content
       	    </div>
       	  </div>

  </div>
  <!-- 左边 -->
  <div class="col-xs-6 col-md-3" style="border:1px;">
  		<div class="panel panel-default">
		  <div class="panel-heading">公告</div>
		  <div class="panel-body">
		    Panel content
		  </div>
		</div>
  </div>
</div>