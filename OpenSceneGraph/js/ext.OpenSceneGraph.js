$(document).ready(function(){
   $('.osg-container').each(function(){
        $(this).children('.fullscreen-control').on('click',function(){
           $(this).parent().toggleClass('osg-fullscreen');
        });
   });
});