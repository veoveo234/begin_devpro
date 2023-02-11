$(document).ready(function () {
  

    
    $("#show-more3").click(function () {
        $("#show-more3").hide();
        $(".early-hide3").slideDown();
    });
    $("#add").click(function () { 
        if($("#count").val() == '')
            x=0;
        var x =parseInt($("#count").val()) +1;
        $("#count").val(x);
        
    });
    $("#minus").click(function () { 
        if($("#count").val() == '')
            x=0;
        var x =parseInt($("#count").val()) -1;
            if ( x<0  )
            {
                x=0;
            }
        $("#count").val(x);
        
    });
    $("#show-show").click(function () { 
        $("#more-des").show();
        $("#show-show").hide();
        
    });
    
    $("#hotc5").click(function () {
        $("#hots5").slideToggle(1000, function () {
            
        });

    });
});