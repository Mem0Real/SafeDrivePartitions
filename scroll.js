//Default active on home
$('#s1').addClass("active");


/*
Smooth scrolling
*/
$("#s1").click(function() {
  $(".nav-container ul li").children().removeClass("active");
    $(this).addClass("active"); 
    $('html, body').animate({
         scrollTop:        $("#home").offset().top-65
    }, 1000);
  return false;
 });

$("#s2").click(function() {
  $(".nav-container ul li").children().removeClass("active");
    $(this).addClass("active"); 
    $('html, body').animate({
         scrollTop:        $("#about").offset().top-100
    }, 1000);
  return false;
 });

$("#s3").click(function() {
  $(".nav-container ul li").children().removeClass("active");
    $(this).addClass("active"); 
    $('html, body').animate({
         scrollTop:        $("#howitworks").offset().top-100
    }, 1000);
  return false;
 });

 $("#s4").click(function() {
  $(".nav-container ul li").children().removeClass("active");
  $(this).addClass("active");
     $('html, body').animate({
         scrollTop:        $("#portifolio").offset().top-100
     }, 1000);
  return false;
 });

 $("#s5").click(function() {
  $(".nav-container ul li").children().removeClass("active");
   $(this).addClass("active");
      $('html, body').animate({
          scrollTop:        $("#order").offset().top-100
      }, 1000);
   return false;
  });

  $("#s6").click(function() {
  $(".nav-container ul li").children().removeClass("active");
    $(this).addClass("active");
       $('html, body').animate({
           scrollTop:        $("#contact").offset().top-100
       }, 1000);
    return false;
   });

/*
Using jquery waypoints to change active on scroll
*/
$('#about').waypoint(function() {

  $(".nav-container ul li").children().removeClass("active");
  $("#s2").addClass("active");
  
}, { offset: 101 });

$('#howitworks').waypoint(function() {
  $(".nav-container ul li").children().removeClass("active");
  $("#s3").addClass("active");
}, { offset: 101 });

$('#portifolio').waypoint(function() {
  $(".nav-container ul li").children().removeClass("active");
  $("#s4").addClass("active");
}, { offset: 101 });

$('#order').waypoint(function() {
  $(".nav-container ul li").children().removeClass("active");
  $("#s5").addClass("active");
}, { offset: 101 });

$('#contact').waypoint(function() {
  $(".nav-container ul li").children().removeClass("active");
  $("#s6").addClass("active");
}, { offset: 101 });

$('#home').waypoint(function() {
  $(".nav-container ul li").children().removeClass("active");
  $("#s1").addClass("active");
}, { offset: 0 });

$('#about').waypoint(function() {
}, { offset: 100 });

$('#home').waypoint(function(event, direction) {
}, { offset: 30 });