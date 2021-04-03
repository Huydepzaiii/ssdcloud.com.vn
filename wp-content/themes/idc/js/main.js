jQuery(document).ready(function(){
	jQuery(".task_list_slide").owlCarousel({
        loop: false,
        autoplay:true,
        items: 1,
        navigation : true,
        stopOnHover : true,
        smartSpeed : 500,
        autoplayTimeout: 3000,
        touchDrag : true,
        mouseDrag: true,
        margin:30,
        responsive: {
            320 :{
                items: 1
            },
            768 :{
                items: 2
            },
            1200 :{
                items: 4
            }
        }
    });
});