function openNav () {
    document.getElementById('myNav').style.width = '100%'
    document.getElementById('body_scroll').style.overflow = 'hidden'
    document.getElementById('nav_height').style.opacity = '0.3'
  }

  function closeNav () {
    document.getElementById('myNav').style.width = '0'
    document.getElementById('body_scroll').style.overflow = 'scroll'
    document.getElementById('nav_height').style.opacity = '1'
  }
  // slider swipe on mobile

  $(document).ready(function() {
   $("#demo").swiperight(function() {
      $(this).carousel('prev');
    });
   $("#demo").swipeleft(function() {
      $(this).carousel('next');
   });
});

   $(document).ready(function() {
   $("#demo1").swiperight(function() {
      $(this).carousel('prev');
    });
   $("#demo1").swipeleft(function() {
      $(this).carousel('next');
   });
});

   $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#accordionOccupation a").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


 


