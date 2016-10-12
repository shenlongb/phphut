$(document).ready(function() {

	$("#photopic_dolphinpic_0").show();
	setInterval("$().photopicdolphin()", 4000);


	(function($){

		$.fn.photopicdolphin = function(){
	
			var rollobj=$(".photopic_dolphin");
			var rolltotal=parseInt(rollobj.size())-1;
			var nextId,nowId;
			$(".photopic_dolphin").each(function(){

				if(this.style.display=='block' || this.style.display=='inline'){
					nowId=parseInt(this.id.substr(20));
					
					if(nowId>=rolltotal){
						nextId=0;
					}else{
						nextId=nowId+1;
					}
				}
			});
			
			$("#photopic_dolphinpic_"+nextId).fadeIn('slow').show('slow');
			$("#photopic_dolphinpic_"+nowId).fadeOut('slow').hide();

		};

	})(jQuery);

});
