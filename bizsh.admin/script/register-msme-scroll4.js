var saveThis = 0;
$(function(){
  var g = $('#row_basics').height();
  $('#scrollablehere').height(g+100);
});

$('.bat').click(function(){
  $('.bat').removeClass('nav-active');
  $(this).addClass('nav-active');
});

function nextScrollen(element){
   $('.bat').removeClass('nav-active');
   $('#'+element).addClass('nav-active');

  var duration = 500;
  var options = { direction: 'right' };
  var effect = 'slide';
  
   var elem = document.getElementById('row_'+element);
   $('.taba').addClass('no-display-with-space'); 
   $('#row_'+element).removeClass('no-display-with-space');
   var g = $('#row_'+element).height();
   $('#scrollablehere').height(g+100);
   $('#'+element).fadeIn().removeAttr('hidden',true);

   if(element == 'story'){
     $('#progress').html('25% Complete');
   }else if(element == 'aboutyou'){
     $('#progress').html('50% Complete');
   }else if(element == 'account'){
     $('#progress').html('75% Complete');
   }else if(element == 'preview'){
     $('#progress').html('100% Complete');
   }
   
   var topPos = elem.offsetTop;
   scrollTo(document.getElementById('scrollablehere'), topPos, 400);  
}

function scrollen(element){
  $('.bat a').removeClass('nav-active');
  $(this).addClass('nav-active');

  var duration = 500;
  var options = { direction: 'right' };
  var effect = 'slide';
  
  var id = $(element).attr('id');
  console.log(id);
   var elem = document.getElementById('row_'+id);
   $('.taba').addClass('no-display-with-space'); 
   $('#row_'+id).removeClass('no-display-with-space');
   var g = $('#row_'+id).height();
   $('#scrollablehere').height(g+100);
   $('#'+id).fadeIn().removeAttr('hidden',true);

   if(id == 'story'){
     $('#progress').html('30% Complete');
   }else if(id == 'aboutyou'){
     $('#progress').html('60% Complete');
   }else if(id == 'preview'){
     $('#progress').html('100% Complete');
   }
   
   var topPos = elem.offsetTop;
   scrollTo(document.getElementById('scrollablehere'), topPos, 400);  
}
 
function scrollTo(element, to, duration) {
    var start = element.scrollTop,
        change = to - start,
        currentTime = 0,
        increment = 10;
        
    var animateScroll = function(){        
        currentTime += increment;
        var val = Math.easeInOutQuad(currentTime, start, change, duration);
        element.scrollTop = val;
        if(currentTime < duration) {
            setTimeout(animateScroll, increment);
        }
    };
    animateScroll();
}

Math.easeInOutQuad = function (t, b, c, d) {
  t /= d/2;
  if (t < 1) return c/2*t*t + b;
  t--;
  return -c/2 * (t*(t-2) - 1) + b;
};
