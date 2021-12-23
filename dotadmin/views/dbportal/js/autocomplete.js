
  $(function() {
    
    var host = baseuri+"api/testapi.php";
    
    var options = {
    
          url: host,

          getValue: "xitemcode",

          requestDelay: 500,

          list: {	
            match: {
              enabled: true
            }
          },
          template: {
              type: "custom",
              method: function(value, item) {
                return item.xdesc + "  " + value;
              }
            },

          theme: "square"
          };

          var con = "countries";

          $("."+con).easyAutocomplete(options); 

 
});
