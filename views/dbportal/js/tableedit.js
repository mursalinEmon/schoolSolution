$(function(){
	//adding rows to table
	var x = 0;	
	$('#addrow').on("click",function(){
		x++;
		var tr = '<tr>';
			tr += '<td>'+x+'</td>';
			tr += '<td><input type="text" class="form-control-plaintext countries" name="fname[]"></td>';
			tr += '<td><input type="text" class="form-control-plaintext" name="lname[]"></td>';
			tr += '<td><input type="text" class="form-control-plaintext" name="handle[]"></td>';
			tr += '<td><button class="form-control rowedit" value="'+x+'">Edit</button></td>'
	  		tr += '</tr>';	
	$('#detailtbl tbody').append(tr);	

	});

	$(document).on('click','.rowedit',function(){
		
	});
});