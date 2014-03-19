function evaluate(){
    var item = $(this);
    var extraSettings = $("customize-control-scc_border_px");
   
    if(item.is(":checked")){
    	item.parent().siblings('customize-control-scc_border_px').slideUp();
    }else{
        extraSettings.slideDown();   
    }
}

$('customize-control-scc_border input[type="checkbox"]').click(evaluate).each(evaluate);