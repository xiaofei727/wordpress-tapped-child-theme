$(document).ready(function(){

	 $("#phone").on("keypress keyup blur",function (event) {    
       $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });


	$("#present").change(function(){
		
		if(this.value == "Keg")
		{
			$(".keg").show();
		}
		else
		{
			$(".keg").hide();	
		}
	});
});