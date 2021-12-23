$('.custom-select').on('click', function(e){
    var _this = $(this)    
    var type = _this.parent().prev().val();
    $.ajax({
        url:'http://localhost/bdvendor/commonapi/codesbytype/'+type, 
        type : 'GET',
        dataType : 'json', 	                    
        beforeSend:function(){    
            $('#userrole').find('option')
                    .remove()
                    .end();  
                                     
                    _this.html('<option>Loading...</option>')
        },
        success : function(result) {                        
            _this.html('<option value=""></option>')
            var _index = 0;
           result.forEach(function(res){
                _index += 1;
                if(_index == 1)
                    _this.append('<option value="'+res.code+'" selected>'+res.code+'</option>');
                else
                    _this.append('<option value="'+res.code+'">'+res.code+'</option>');
           });
                    
        },
        error: function(xhr, resp, text) {
            _this.html('<option></option>')
           
            console.log(xhr, resp, text);
        }
    });
    
});

$(function(){
    
});