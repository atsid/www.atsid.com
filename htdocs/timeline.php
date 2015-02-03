<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>ATS Timeline</title>
<link href="//fonts.googleapis.com/css?family=Open Sans:100,200,300,400,500,800&subset=latin" rel="stylesheet" type="text/css" />

<style>

body {
	font-family:'Open Sans';
	text-align: center;
	margin: 0;
	padding: 0;
}

.iScrollHorizontalScrollbar, :before, a {
	-webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    -ms-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
}


.factoids li h3, .factoids li p {
	-webkit-transition: all 0.5s ease-out;
    -moz-transition: all 0.5s ease-out;
    -o-transition: all 0.5s ease-out;
    -ms-transition: all 0.5s ease-out;
    transition: all 0.5s ease-out;
}


line { display: block; }

#timelineBox {
	margin:0 auto;
	width:710px;
	height:420px;
	background-color:#e0e0e0;
	position:relative;
	overflow:hidden;
	cursor: ew-resize;
	box-sizing:border-box; 
	-moz-box-sizing:border-box;
}
#timelineBox * { box-sizing:border-box; -moz-box-sizing:border-box; }
#timelineSlider {
	position:absolute;
	height: 100%;
	width:1600px;
	
	/* Prevent elements to be highlighted on tap */
	-webkit-tap-highlight-color: rgba(0,0,0,0);

	/* Put the scroller into the HW Compositing layer right from the start */
	-webkit-transform: translateZ(0);
	-moz-transform: translateZ(0);
	-ms-transform: translateZ(0);
	-o-transform: translateZ(0);
	transform: translateZ(0);
	
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
#timelineSlider:before, #timelineSlider:after {
	content:'';
	position: absolute;
	display: block;
	top:0;
	left:0;
	width:200px;
	height:100%;
	z-index: 4;
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2UwZTBlMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlMGUwZTAiIHN0b3Atb3BhY2l0eT0iMCIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(left,  rgba(224,224,224,1) 0%, rgba(224,224,224,0) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(224,224,224,1)), color-stop(100%,rgba(224,224,224,0))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  rgba(224,224,224,1) 0%,rgba(224,224,224,0) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  rgba(224,224,224,1) 0%,rgba(224,224,224,0) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  rgba(224,224,224,1) 0%,rgba(224,224,224,0) 100%); /* IE10+ */
	background: linear-gradient(to right,  rgba(224,224,224,1) 0%,rgba(224,224,224,0) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0e0e0', endColorstr='#00e0e0e0',GradientType=1 ); /* IE6-8 */
}
#timelineSlider:after {
	left:auto;
	right:0;
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2UwZTBlMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlMGUwZTAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(left,  rgba(224,224,224,0) 0%, rgba(224,224,224,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(224,224,224,0)), color-stop(100%,rgba(224,224,224,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left,  rgba(224,224,224,0) 0%,rgba(224,224,224,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left,  rgba(224,224,224,0) 0%,rgba(224,224,224,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left,  rgba(224,224,224,0) 0%,rgba(224,224,224,1) 100%); /* IE10+ */
	background: linear-gradient(to right,  rgba(224,224,224,0) 0%,rgba(224,224,224,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00e0e0e0', endColorstr='#e0e0e0',GradientType=1 ); /* IE6-8 */
}

.iScrollIndicator {
	border:none !important;
	border-radius:0 !important;
	background-color:#000 !important;
}
.iScrollHorizontalScrollbar {
	height:2px !important;
	bottom:3px !important;
	left:3px !important;
	right:3px !important;
	opacity: 0.2;
}
#timelineBox:hover .iScrollHorizontalScrollbar { opacity:0.5; }


#timeline {
	position:absolute;
	height:70px;
	width:100%;
	bottom:10px;
	left:0;
	padding: 0 5px;
}
#timeline:before {
	content:'';
	display: block;
	width:100%;
	height:2px;
	position:absolute;
	left:0;
	top:50%;
	margin-top:-1px;
	background-color:#838383;
	z-index:2;
	box-shadow:0 0 0 1px #e0e0e0;
}
.year {
	position:relative;
	float:left;
	height:70px;
	width:50px;
	margin:10px 8px 10px 7px;
	text-align:center;
}
.year a {
	width:50px;
	height:50px;
	border-radius: 50%;
	background-color: #a41c0e;
	display: inline-block;
	line-height: 50px;
	color: #fff;
	position: relative;
	z-index: 3;
	font-weight:800;
	cursor: pointer;
	box-shadow:0 0 0 1px #e0e0e0;
	font-size: 16px;
}
.year a:hover { background-color: #82160b; }
.year.active a { background-color: #000; }
.year.empty { width:2px; text-align:center; margin:25px 8px 25px 7px; }
.year.empty a {
	display:inline-block;
	width:1px;
	height:14px;
	line-height:70px;
	background-color:#838383;
	border-radius:0;
	z-index:1;
	cursor:default;
}
.year.empty a span {
	position:absolute;
	width:16px;
	height:10px;
	font-size:9px;
	font-weight:normal;
	color:#888;
	top:-18px;
	left:-8px;
	line-height: 20px;
}
line {
	position:absolute;
	bottom:0;
	left:0;
	width:2px;
	height:0;
	background-color: #8d8d8d;
}
.factoids {
	position:absolute;
	display: table;
	bottom:80px;
	left:24px;
	min-width:400px;
	height:340px;
	font-size:13px;
	font-weight:normal;
	text-align:left;
}

.factoids h3 { margin:0; color:rgba(0,0,0,0); }
.factoids p { margin:0; color:rgba(0,0,0,0); }
.factoids .on h3 { margin:0; color:rgba(0,0,0,1); }
.factoids .on p { margin:0; color:#888; }
.factoids ul {
	padding:0;
	margin:0;
	display:table-cell;
	height:100%;
	width:auto;
	vertical-align:middle;
	position: relative;
	z-index: 5;
}
.factoids ul li {
	margin:0;
	padding:10px 20px;
	list-style:none;
	position: relative;
}
.factoids ul li:before {
	position:absolute;
	left:-1px;
	top:19px;
	width:1px;
	height:1px;
	content:'';
	background-color:#a41c0e;
	border:1px solid #a41c0e;
	border-radius:50%;
	box-shadow:0 0 0 0 #a41c0e, 0 0 0 3px #e0e0e0;
	opacity:0;
}
.factoids ul li.on:before {
	box-shadow:0 0 0 5px #a41c0e, 0 0 0 8px #e0e0e0;
	opacity:1;
}

/** FLIP THE FACTOIDS **/
.factoids.flip { left:auto; right:24px; text-align: right; }
.factoids.flip line { left: auto; right:0; }
.factoids.flip ul li:before { left:auto; right:0; }
</style>


<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<script src="/wp-content/themes/ats/js/iscroll.js"></script>
<script>
var myScroll;
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

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
		var centeringX = itemPosX-(($('#timelineBox').width()-itemBox.width())/2)
		
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
</script>


</head>
<body>

<div id="timelineBox" title="Click, Drag, and Move"><div id="timelineSlider">
	<div id="timeline">
		<div class="year empty"><a><span>1970</span></a></div>
		<div class="year empty"><a><span>1971</span></a></div>
		<div class="year empty"><a><span>1972</span></a></div>
		<div class="year empty"><a><span>1973</span></a></div>
		<div class="year empty"><a><span>1974</span></a></div>
		<div class="year empty"><a><span>1975</span></a></div>
		<div class="year empty"><a><span>1976</span></a></div>
		<div class="year empty"><a><span>1977</span></a></div>
		<div class="year empty"><a><span>1978</span></a></div>
		<div class="year empty"><a><span>1979</span></a></div>
		<div class="year"><a><span>1980</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>1981</span></a></div>
		<div class="year"><a><span>1982</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Disco Begins a Downward Spiral</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year"><a><span>1983</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Star Wars: Return of the Jedi</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>1984</span></a></div>
		<div class="year empty"><a><span>1985</span></a></div>
		<div class="year empty"><a><span>1986</span></a></div>
		<div class="year empty"><a><span>1987</span></a></div>
		<div class="year empty"><a><span>1988</span></a></div>
		<div class="year empty"><a><span>1989</span></a></div>
		<div class="year empty"><a><span>1990</span></a></div>
		<div class="year empty"><a><span>1991</span></a></div>
		<div class="year"><a><span>1992</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>1993</span></a></div>
		<div class="year"><a><span>1994</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Disco Begins a Downward Spiral</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>1995</span></a></div>
		<div class="year empty"><a><span>1996</span></a></div>
		<div class="year empty"><a><span>1997</span></a></div>
		<div class="year empty"><a><span>1998</span></a></div>
		<div class="year empty"><a><span>1999</span></a></div>
		<div class="year empty"><a><span>2000</span></a></div>
		<div class="year empty"><a><span>2001</span></a></div>
		<div class="year empty"><a><span>2002</span></a></div>
		<div class="year empty"><a><span>2003</span></a></div>
		<div class="year empty"><a><span>2004</span></a></div>
		<div class="year"><a><span>2005</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Star Wars: Return of the Jedi</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>2006</span></a></div>
		<div class="year"><a><span>2007</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>2008</span></a></div>
		<div class="year empty"><a><span>2009</span></a></div>
		<div class="year"><a><span>2010</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Disco Begins a Downward Spiral</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year"><a><span>2011</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Star Wars: Return of the Jedi</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
			</ul></div>
		</div>
		<div class="year"><a><span>2012</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year"><a><span>2013</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Disco Begins a Downward Spiral</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
				<li><h3>ATS Founded</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
				<li><h3>Awarded US Navy Contract</h3><p>Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus.</p></li>
			</ul></div>
		</div>
		<div class="year"><a><span>2014</span></a>
			<div class="factoids"><line></line><ul>
				<li><h3>Star Wars: Return of the Jedi</h3><p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.</p></li>
			</ul></div>
		</div>
		<div class="year empty"><a><span>2015</span></a></div>
		<div class="year empty"><a><span>2016</span></a></div>
		<div class="year empty"><a><span>2017</span></a></div>
		<div class="year empty"><a><span>2018</span></a></div>
		<div class="year empty"><a><span>2019</span></a></div>
		<div class="year empty"><a><span>2020</span></a></div>
		<div class="year empty"><a><span>2021</span></a></div>
		<div class="year empty"><a><span>2022</span></a></div>
		<div class="year empty"><a><span>2023</span></a></div>
		<div class="year empty"><a><span>2024</span></a></div>
	</div>
</div></div>

</body>
</html>