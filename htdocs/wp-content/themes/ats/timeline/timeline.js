$(document).ready(function() {
	initTimeline();
});

var myScroll;
function initTimeline() {
	
	// TAKE OFF FIRST 2 DIGITS OF YEARS NOT BEING USED
	$('#timeline .empty a span').each(function() {
		$(this).html($(this).html().substring(2,4));
	});
	
	// SIZE THE SLIDER BOX TO THE WIDTH OF ITS ELEMENTS + THE TIMELINE PADDING
	var sliderWidth = $('.year.empty').length*17;
	sliderWidth += $('.year:not(.empty)').length*65;
	$('#timelineSlider').width(sliderWidth+10);
	
	// ACTIVATE THE YEAR LINKS
	$('#timeline .year a').each(function(i) {
		var link = $(this);
		link.click(function() { switchYear(link); });
	});
	
	// FLIP THE HORIZONTAL ORIENTATION OF THE FACTOIDS OF THE LAST 4 YEARS TO FIT INTO THE WINDOW
	var lastCount = 1;
	$($('.year:not(.empty) .factoids').get().reverse()).each(function() {
		if(lastCount <= 5) $(this).addClass('flip');
		lastCount++;
	});
	
	$('.factoids').hide();
	setTimeout(function() { switchYear($('.year:not(.empty)').eq(0).find('a')); }, 1000);
	myScroll = new IScroll('#timelineBox', { eventPassthrough:true, scrollX:true, scrollY:false, preventDefault:false, scrollbars:true, mouseWheel:true });
}

var isSwitchingYear = false;
function switchYear(link) {
	
	var isSameYear = ($('.year.active').length && link.get(0).isEqualNode($('.year.active > a').get(0))) ? true: false;
	
	if(!isSwitchingYear && !isSameYear) {
	
		isSwitchingYear = true;
		
		// RESET THE ACTIVE YEAR
		var activeFacts = $('.year.active .factoids');
		$('.year.active').removeClass('active');
		setTimeout(function() { activeFacts.find('line').animate({ 'height':0 }, 200, 'easeOutCubic', function() { activeFacts.hide(); }); }, 250);
		activeFacts.find('.on').removeClass('on');
		
		// ACTIVATE THE NEW YEAR
		link.parent().addClass('active');
		link.parent().find('.factoids').show();
		
		// CHECK IF NEW FACTOID LIST IS IN FULL VIEW
		var itemBox = link.parent().find('.factoids');
		var itemPosX = (!itemBox.hasClass('flip')) ? link.parent().position().left: link.parent().position().left-itemBox.width();
		var sliderPosX = Math.abs($('#timelineSlider').position().left);
		var itemToWindowPos = (itemPosX - sliderPosX)+itemBox.width();
		var outOfRange = (itemToWindowPos > $('#timelineBox').width()-50 || itemToWindowPos < itemBox.width()+50) ? true: false;
		var centeringX = itemPosX-(($('#timelineBox').width()-itemBox.width())/2);
		centeringX = (outOfRange && itemToWindowPos > $('#timelineBox').width()-50) ? centeringX+20: centeringX+50;
		
		console.log(outOfRange);
		
		if(outOfRange) myScroll.scrollTo(-centeringX, 0, 500, IScroll.utils.ease.quadratic);
		
		// GRADUALLY REVEAL ALL THE ELEMENTS OF THE NEW FACTOID LIST
		var line = link.parent().find('line');
		var lineHeight = line.parent().find('ul > li:first-child').position();
		lineHeight = (line.parent().height()-lineHeight.top)-21;
		line.animate({ 'height':lineHeight }, 400, 'easeOutCubic', function() {
			line.parent().find('li').each(function(i) {
				var theLI = $(this);
				setTimeout(function() { theLI.addClass('on'); }, i*100);
			});
			setTimeout(function() { isSwitchingYear = false; }, 500);
		});
	}
}