
//添加参数
$(document).on('click','.add-parameter',function(){
	var tpl = '<tr><td>';
		tpl +='<input type="text" placeholder="参数名称"  name="parameter-name[]" id="exampleInputEmail1" class="form-control"></td>';
		tpl +='<td><input type="text" style="float:left;width:430px;margin: 0 10px 0 0;"  name="parameter-value[]"  placeholder="参数值" id="exampleInputEmail1" class="form-control">';
		tpl +='<button class="btn btn-danger delete-parameter" type="button">删除参数</button></td></tr>';
		$('.parameter').append(tpl);
});

//删除参数
$(document).on('click','.delete-parameter',function(){
	$(this).parent().parent().remove();
});

//请求
$(document).on('click','.submit',function(){
	var data = $('#ajaxform').serialize();
	$.post('index.php?r=index/interface',data,function(ev){
		$('#results').html(jsonStringify(ev ,4));
	},'JSON');
});

function jsonStringify(data,space){
    var seen=[];
    return JSON.stringify(data,function(key,val){
        if(!val||typeof val !=='object'){
            return val;
        }
        if(seen.indexOf(val)!==-1){
            return '[Circular]';
        }
        seen.push(val);
        return val;
    },space);

}