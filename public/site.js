$( document ).ready(function() {
    $(".special-collection .tabs-container ul li a.head-tabs").on('click', function(){
        $(".special-collection .tabs-container ul li a.head-tabs").removeClass('active');
        $(this).addClass('active');
        var idActive = $(this).attr('href');
        $('.special-collection .content-tab-proindex').hide();
        $(idActive).show();
    });
    // $(".wrapper-tab-collections .tabs-container ul li a.head-tabs").on('click', function(){
    //     $(".wrapper-tab-collections .tabs-container ul li a.head-tabs").removeClass('active');
    //     $(this).addClass('active');
    //     var idActive = $(this).attr('href');
    //     $('.wrapper-tab-collections .content-tab-proindex').hide();
    //     $(idActive).show();
    // });
    
});