
    $(function(){
      $("#search-here").click(function(){
        $('#overlay').toggle("1000");
        $('#overlay').removeClass("display-n");
          myvid1.pause();
          myvid2.pause();
          myvid3.pause();
      });

       $(".closebtn").click(function(){
        $('#overlay').toggle("1000");
        $('#overlay').addClass("display-n");
          myvid1.play();
          myvid2.play();
          myvid3.play();
      });
    });
        

  var myvid1 = $('#vid1')[0];
  var myvid2 = $('#vid2')[0];
  var myvid3 = $('#vid3')[0];
  $(window).scroll(function(){
    var scroll = $(this).scrollTop();
    if (scroll > 120) {
      myvid1.pause();
      myvid2.pause();
      myvid3.pause();
    }else{
      myvid1.play();
      myvid2.play();
      myvid3.play();
    }
     
  });
  
