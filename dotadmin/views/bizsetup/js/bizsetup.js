$(function () {		
	$('.loader').hide();
	 //  	$("#my_form").submit(function(event){
		//     event.preventDefault(); //prevent default action 
		//     var post_url = "http://localhost/bdvendor/companysetup/save"; //get form action url
		//     var request_method = "post"; //get form GET/POST method
		// 	var form_data = new FormData(this); //Creates new FormData object
		//     $.ajax({
		//         url : post_url,
		//         type: request_method,
		//         data : form_data,
		// 		contentType: false,
		// 		cache: false,
		// 		processData:false
		//     }).done(function(response){ //
		//         $("#server-results").html(response);
		//     });
		// });
		
		 


});

function saveform(formid, url){
	
	// send ajax
	$.ajax({
		url: url, // url where to submit the request
		type : "POST", // type of action POST || GET
		dataType : 'json', // data type
		data : $("#"+formid).serialize(), // post data || get data
		beforeSend:function(){
			$('.loader').show();
		},
		success : function(result) {
			// you can see the result from the console
			// tab of the developer tools
			$('.loader').hide();
			toastr.success(result);
			//console.log(result);
		},
		error: function(xhr, resp, text) {
			$('.loader').hide();
			console.log(xhr, resp, text);
		}
	})


}