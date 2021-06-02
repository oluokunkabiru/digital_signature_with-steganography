$(document).ready(function(){
  $(".icon-Search").click(function(){
    console.log(1);
    $(".search_overlay").addClass("show")  
    })
    
   $(".close_search").click(function(){
    $(".search_overlay").removeClass("show")  
    }) 
   
});