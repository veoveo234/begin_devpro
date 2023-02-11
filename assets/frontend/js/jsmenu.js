$(document).ready(function() {
  
    $('.sub-menu').hover(function () {
        $('.list-sub').show();
        }, function () {
            $('.list-sub').hide();
        }
    );
    // gio hang
    $(".cart").hover(function () {
            $(".inside-cart").show(300);
            // $(".inside-cart").show();
        }, function () {
            $(".inside-cart").hide(100);
            // $(".inside-cart").hide();
        }
    );
    $(".inp-search").keyup(function() {
        var strkey = $("#key").val();
        // trim() cat khoang trắng
        if (strkey.trim() == "")
          $(".smart-search").attr("style", "display:none");
        else
          $(".smart-search").attr("style", "display:block");
        //sd ajax đẻ lay du lieu
        $.get("index.php?controller=search&action=ajaxSearch&key="+strkey, function(data) {
          // clear data của thẻ ul
          $(".smart-search ul").empty();
          //them du lieu vua lay dc bang ajax vao the ul 
          $(".smart-search ul").append(data);
        });
      })
});