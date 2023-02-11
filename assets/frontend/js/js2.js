$(document).ready(function () {

    $("#show-more").click(function () {
        $("#show-more").hide();
        $(".early-hide").slideDown();
    });
    $("#show-more2").click(function () {
        $("#show-more2").hide();
        $(".early-hide2").slideDown();
    });

    $("#show-more3").click(function () {
        $("#show-more3").hide();
        $(".early-hide3").slideDown();
    });
    $("#hotcl").click(function () {
        $("#hots1").slideToggle(1000, function () {

        });

    });
    $(".show-and-hide").click(function () {
        $(".hots1").slideToggle(1000, function () {

        });

    });
    $("#hotc3").click(function () {
        $("#hots3").slideToggle(1000, function () {

        });

    });
    $("#hotc4").click(function () {
        $("#hots4").slideToggle(1000, function () {

        });

    });

    //
    $(".inp-search").keyup(function () {
        
        var strkey = $("#key_search").val();
        // trim() cat khoang trắng
        if (strkey.trim() == "")
            $(".smart-search").attr("style", "display:none");
        else
            $(".smart-search").attr("style", "display:block");
        //sd ajax đẻ lay du lieu
        $.get("index.php?controller=search&action=ajaxSearch&get=" + strkey, function (data) {
            // clear data của thẻ ul
            $(".smart-search ul").empty();
            //them du lieu vua lay dc bang ajax vao the ul 
            $(".smart-search ul").append(data);
        });
        })
        
    });