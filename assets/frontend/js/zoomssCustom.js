$(document).ready(function () {
    
    $('.imgsmall img').click(function () { 
        var images = $(this).attr('src');
        $('#img1').attr('src', images);
    });

    // img zoom detail
    // $('#img1').imagezoomsl({
    //     zoomrange: [4, 4],
    //     stepzoom: 0.5,
    //     zoomstart: 2,
    //     cursorshadeopacity: 0.3
    // });
    
// var options1 = {
//     width: 360,
//     height: 360,
//     zoomWidth: 500,
//     offset: {vertical: 10, horizontal: 10},
//     scale:1.5,
// };

// // If the width and height of the image are not known or to adjust the image to the container of it
// var options2 = {
//     fillContainer: true,
//     offset: {vertical: 5, horizontal: 5}
// };
//     var container =document.getElementById("img-container");
//     window.imageZoom = new ImageZoom(container, options1);

});
