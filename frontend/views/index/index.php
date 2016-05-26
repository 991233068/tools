<?php

/* @var $this yii\web\View */

$this->title = '在线接口调试工具';
?>
<div class="row">
  <!-- 右边 -->
  <div class="col-xs-12 col-md-9" style="border:1px;-moz-box-shadow: 10px 10px 5px #888888; /* 老的 Firefox */box-shadow: 2px 5px 8px #888888;">
       	<form action="" method="post" id="ajaxform">
           	<div class="form-group" style="margin-top:10px;height: 35px;">
           	    <label for="inputPassword" class="col-sm-2 control-label" style="padding-right:0px;">
           	    	<select class="form-control" name="type">
           	    		<option value="1">get</option>
           	    		<option value="2">post</option>
           	    	</select>
           	    </label>
           	    <div class="col-sm-10">
           	      <input type="text" class="form-control" id="inputPassword" placeholder="http://" name="parameter-url" style="width:460px;">
           	      <button type="button" class="btn btn-success submit">提交</button>
                  <input type="checkbox" name="ishttps" value="1">是否https请求
           	    </div>
           	  </div>

           	  <table class="table table-bordered" style="margin-top:10px;">
           	    	<tr>
           	    		<td>参数名称</td>
           	    		<td>参数值</td>
           	    	</tr>
                  <tbody class="parameter">
           	    	<tr>
           	    		<td><input type="text" class="form-control" id="exampleInputEmail1" placeholder="参数名称" name="parameter-name[]"></td>
           	    		<td><input type="text" class="form-control" id="exampleInputEmail1" placeholder="参数值" name="parameter-value[]" style="float:left;width:430px;margin: 0 10px 0 0;">
           	    		<button type="button" class="btn btn-danger delete-parameter">删除参数</button></td>
           	    	</tr>
                  </tbody>
           	    	<tr>
           	    		<td colspan="2"><button type="button" class="btn btn-primary add-parameter">添加参数</button></td>
           	    		<!-- <td>ss</td> -->
           	    	</tr>
           	  </table>
          </form>
       	  <div class="panel panel-default">
       	    <div class="panel-heading">返回结果：</div>
       	    <pre class="panel-body" style="height:250px;" id="results">
       	    </pre>
       	  </div>

  </div>
  <!-- 左边 -->
  <div class="col-xs-6 col-md-3" style="border:1px;">
  		<div class="panel panel-default">
		  <div class="panel-heading">公告</div>
		  <div class="panel-body">
		    欢迎大家前来留言提意见，我们将越做越好，谢谢大家的支持~~~
            <br/>
              <hr/>
            工具已支持https接口调试了哦~~
		  </div>
		</div>
  </div>
</div>
<script type="text/javascript" src="/js/index.js"></script>