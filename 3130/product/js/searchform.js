$(document).ready(function(){
	if($("#searchform_product_key")[0].value==""){
		$("#searchform_product_key")[0].value="产品关键词";
		$("#searchform_product_key").focus(function(){
			$("#searchform_product_key")[0].value="";
		});
	}
	if($("#searchform_product_key")[0].value=="产品关键词"){
		$("#searchform_product_key").focus(function(){
			$("#searchform_product_key")[0].value="";
		});
	}
});