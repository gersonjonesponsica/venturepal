function collision($div1, $div2) {
      var x1 = $div1.offset().left;
      var w1 = 40;
      var r1 = x1 + w1;
      var x2 = $div2.offset().left;
      var w2 = 40;
      var r2 = x2 + w2;
        
      if (r1 < x2 || x1 > r2) return false;
      return true;
      
    }
    
// // slider call

$('#slider').slider({
	range: true,
	min: 0,
	max: 1000000,
	step: 10000,
	values: [ 0, 1000000 ],
	slide: function(event, ui) {
		
		$('.ui-slider-handle:eq(0) .price-range-min').html('P' + ui.values[ 0 ]);
		$('.ui-slider-handle:eq(1) .price-range-max').html('P' + ui.values[ 1 ]);
		$('.price-range-both').html('<i>$' + ui.values[ 0 ] + ' - </i>$' + ui.values[ 1 ] );
		
		//
		
	    if ( ui.values[0] == ui.values[1] ) {
	      $('.price-range-both i').css('display', 'none');
	    } else {
	      $('.price-range-both i').css('display', 'inline');
	    }
        
        //
		
		if (collision($('.price-range-min'), $('.price-range-max')) == true) {
			$('.price-range-min, .price-range-max').css('opacity', '0');	
			$('.price-range-both').css('display', 'block');		
		} else {
			$('.price-range-min, .price-range-max').css('opacity', '1');	
			$('.price-range-both').css('display', 'none');		
		}
		
	}
});

$('.ui-slider-range').append('<span class="price-range-both value"><i>P' + $('#slider').slider('values', 0 ) + ' - </i>' + $('#slider').slider('values', 1 ) + '</span>');

$('.ui-slider-handle:eq(0)').append('<span class="price-range-min value">P' + $('#slider').slider('values', 0 ) + '</span>');

$('.ui-slider-handle:eq(1)').append('<span class="price-range-max value">P' + $('#slider').slider('values', 1 ) + '</span>');