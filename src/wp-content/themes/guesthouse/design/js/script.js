$j = jQuery.noConflict();

$j(function(){

	var isTouch = navigator.userAgent.toLowerCase().match(/(iphone|ipod|ipad|android)/);

	Wpml_change_flag();

	CustomizeMenu();

	RollUpMenu();

	ApplyColorbox();

	ApplyFancyboxVideo();

	InitMisc();

	HoverZoomInit();

	OpenCloseShortcode();

	PrettySociableInit();
	
	DropdownPanel();
	
	RoomIcons();
	
	DatePickers();
	
	SmallRoomViewerDescription();
	
	RoomThumb();
	
	HomeRoomViewerActivateForm();
	
	SliderCheck();
	
	notificationClose();
	
	widgetsSize();

});
function SliderCheck(){
  if($j(".slider").has('#no-slider').length){
    //alert("no slider");
    $j(".white-space").css({"background-image":"none",'height':'30px'});
    $j(".white-space-sub").css({"background-image":"none",'height':'30px'});
    $j("#no-slider").css({'margin-bottom':'0px'});    
  }
  else if($j(".slider").has('.subpage-slider-container').length){
    //alert("small slider");
    $j(".white-space").css({"background-position":"50% 58%"});
  }
  else{
    //alert("big slider");
  }
}

function HomeRoomViewerActivateForm(){
  $j("#room-controls-1").find("img").addClass("active");
  $j(".reservation-form").css({"display":"block"});
}

function SmallRoomViewerDescription(){
  $j("#showHideHousing").click(function(){
	  if( $j(this).hasClass('show') == true )
    {
      //$j("#subpage-room-options-container-left").hide('slow');
      $j("#subpage-room-options-container-left").hide("slide",{direction: "left"},'fast');
      $j(this).removeClass('show');
      $j(this).addClass('hide');
    }
    else
    {
      //$j("#subpage-room-options-container-left").show('slow');
      $j("#subpage-room-options-container-left").show("slide",{direction: "left"},'fast');
      $j(this).removeClass('hide');
      $j(this).addClass('show');
    }
	});
}

function widgetsSize() {
	i=0;
	$j('div.footer-widgets-container > div.box').each( function() {
		$j('div.footer-widgets-container > div.box').eq(i).addClass('col-' + (i+1));
	i++;
	});
}

function RoomThumb(){
  $j("#roomThumb").attr({'src':$j("#roomThumbCont").val()});
}

function PopulateForm(form){
  var sendFormLink = $j("#"+form).find("#formLink").val();
  var room = $j("#"+form).find('#room :selected').text();
  var roomThumb = $j("#"+form).find('#room :selected').val();
  var dateFrom = $j("#"+form).find("#datePicker1").val();
  var dateTo = $j("#"+form).find("#datePicker2").val();
  
  var count = 4;
  
  if(sendFormLink != ""){count--;}else{}
  if(room != "Choose your Room"){count--;}
  if(dateFrom != "From"){count--;}
  if(dateTo != "To"){count--;}
  
  if(count == 0){
    //console.log(window.location.href);
    if(sendFormLink.indexOf("?") != -1)
    {
      $j(window.location).attr('href', sendFormLink+'&roomname='+room+'&from='+dateFrom+'&to='+dateTo+'&roomthumb='+roomThumb);
    }
    else
    {
      $j(window.location).attr('href', sendFormLink+'?roomname='+room+'&from='+dateFrom+'&to='+dateTo+'&roomthumb='+roomThumb);
    }
  }
  else{
    // alert or something :-)
    alert('Please Choose the Room and Dates');
  }
}

function DatePickers(){
    var dateFormatVar = $j("#datepickerFormat").text();
    
    $j( "#datePicker1" ).datepicker({dateFormat : dateFormatVar});
    $j( "#datePicker2" ).datepicker({dateFormat : dateFormatVar});    
}

function RoomIcons(){
  $j(".room-controls a").click(function(){
     $j(".room-controls a img").removeAttr("class");
     $j(this).find('img').attr({"class":"active"});
     if($j(this).attr('id') == "room-controls-1")
     {
        //$j("").show('slow');
        $j(".reservation-form").css({"display":"block"});
     }
     else
     {
        $j(".reservation-form").css({"display":"none"});
     }     
  });
}

function DropdownPanel(){
  $j(".btn-drop").click(function(){
	  $j("#dropdown-panel").slideToggle($j("#dropdown-panel-speed").text());
	  $j('.dropdown-panel-control-button-content').toggleClass("active");
	});
}

function PrettySociableInit(){

	var homeUrl = $j("body").data("themeurl");
	$j.prettySociable({websites: {
				facebook : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Facebook',
					'url': 'http://www.facebook.com/share.php?u=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/facebook.png',
					'sizes':{'width':70,'height':70}
				},
				twitter : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Twitter',
					'url': 'http://twitter.com/home?status=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/twitter.png',
					'sizes':{'width':70,'height':70}
				},
				delicious : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Delicious',
					'url': 'http://del.icio.us/post?url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/delicious.png',
					'sizes':{'width':70,'height':70}
				},
				digg : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Digg',
					'url': 'http://digg.com/submit?phase=2&url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/digg.png',
					'sizes':{'width':70,'height':70}
				},
				linkedin : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'LinkedIn',
					'url': 'http://www.linkedin.com/shareArticle?mini=true&ro=true&url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/linkedin.png',
					'sizes':{'width':70,'height':70}
				},
				reddit : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'Reddit',
					'url': 'http://reddit.com/submit?url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/reddit.png',
					'sizes':{'width':70,'height':70}
				},
				stumbleupon : {
					'active': true,
					'encode':false, // If sharing is not working, try to turn to false
					'title': 'StumbleUpon',
					'url': 'http://stumbleupon.com/submit?url=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/stumbleupon.png',
					'sizes':{'width':70,'height':70}
				},
				tumblr : {
					'active': true,
					'encode':true, // If sharing is not working, try to turn to false
					'title': 'tumblr',
					'url': 'http://www.tumblr.com/share?v=3&u=',
					'icon':homeUrl+'/design/img/prettySociable/large_icons/tumblr.png',
					'sizes':{'width':70,'height':70}
				}
			}});
}

function Wpml_change_flag()
{
  $j(".flags").mouseover(function(){
	  $j(this).css({'overflow':'visible'});
	});
	
	$j(".flags").mouseout(function(){
	  $j(this).css({'overflow':'hidden'});
	});
}

function CustomizeMenu(){
	$j(".mainmenu > ul > li").each(function(){
		if($j(this).has('ul').length){
			$j(this).addClass("parent");
		}
	});
}

function RollUpMenu(){
  var time = parseInt($j('#mainmenu-dropdown-duration').text());
  var easing = $j('#mainmenu-dropdown-easing').text();
  
  $j(".mainmenu ul").find('ul').each(function(){
    $j(this).css({'display':'block', 'visibility':'none'});
  });
	
  $j(".mainmenu").find('ul').children('li').each(function(){
    if($j(this).has('ul').length){
      var submenu = $j(this).children('ul');
      var submenuHeight =  submenu.height();
      $j(this).hover(function(){
        submenu.css({'display':'block', 'height':'0'}).stop(true,true).animate({'height':submenuHeight}, time, easing);
      }, function(){
        submenu.css({'display':'none','height':submenuHeight});
      });
    }
  });
  
  $j(".mainmenu ul").find('ul').each(function(){
    $j(this).css({'display':'none', 'visibility':'block'});
  });
}

function ApplyColorbox(){
	// Apply fancybox on all images
	$j("a[href$='gif']").colorbox({rel: 'group', maxHeight:"95%"});
	$j("a[href$='jpg']").colorbox({rel: 'group', maxHeight:"95%"});
	$j("a[href$='png']").colorbox({rel: 'group', maxHeight:"95%"});
}

function ApplyFancyboxVideo(){
	// AIT-Portfolio videos
	$j(".ait-portfolio a.video-type").click(function() {

		var address = this.href
		if(address.indexOf("youtube") != -1){
			// Youtube Video
			$j.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
		} else if (address.indexOf("vimeo") != -1){
			// Vimeo Video
			// parse vimeo ID
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = this.href.match(regExp);

			if (match){
			    $j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'title'			: this.title,
					'width'			: 680,
					'height'		: 495,
					'href'			: "http://player.vimeo.com/video/"+match[2]+"?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff",
					'type'			: 'iframe'
				});
			} else {
			    alert("not a vimeo url");
			}
		}
		return false;
	});

	// Images shortcode
	$j("a.sc-image-link.video-type").click(function() {

		var address = this.href
		if(address.indexOf("youtube") != -1){
			// Youtube Video
			$j.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
					'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
		} else if (address.indexOf("vimeo") != -1){
			// Vimeo Video
			// parse vimeo ID
			var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
			var match = this.href.match(regExp);

			if (match){
			    $j.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'title'			: this.title,
					'width'			: 680,
					'height'		: 495,
					'href'			: "http://player.vimeo.com/video/"+match[2]+"?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff",
					'type'			: 'iframe'
				});
			} else {
			    alert("not a vimeo url");
			}
		}
		return false;
	});
}


function InitMisc() {
  $j('#content input, #content textarea').each(function(index) {
    var id = $j(this).attr('id');
    var name = $j(this).attr('name');
    if (id.length == 0 && name.length != 0) {
      $j(this).attr('id', name);
    }
  });

  $j('#content label').inFieldLabels();

  $j('.rule span').click(function() {
	  $j.scrollTo(0, 1000, {axis:'y'});
	  return false;
 });

}


function HoverZoomInit() {
  //// Post images
  //$j('#content .entry-thumbnail a').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8});

  // default wordpress gallery
  $j('#content .gallery-item a').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8,zoom:0});

  // ait-portfolio
  $j('#content .ait-portfolio a').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8,zoom:0});

  // schortcodes
  $j('#content a.sc-image-link').hoverZoom({overlayColor:'#333333',overlayOpacity: 0.8,zoom:0});

}


function OpenCloseShortcode(){

	//$j('#content .frame .frame-close.closed').parent().find('.frame-wrap').hide();
	$j('#content .frame .frame-close.closed .close.text').hide();
	$j('#content .frame .frame-close.closed .open.text').show();

	$j('#content .frame .frame-close').click(function(){
		if($j(this).hasClass('closed')){
			var $butt = $j(this);
			$j(this).parent().find('.frame-wrap').slideDown('slow',function(){
				$butt.removeClass('closed');
				$butt.find('.close.text').show();
				$butt.find('.open.text').hide();
			});
		} else {
			var $butt = $j(this);
			$j(this).parent().find('.frame-wrap').slideUp('slow',function(){
				$butt.addClass('closed');
				$butt.find('.close.text').hide();
				$butt.find('.open.text').show();
			});

		}

	});
}

function notificationClose() {
	$j('.sc-notification').children('a.close').click( function(event) {
		event.preventDefault();
		$j(this).parent().fadeOut('slow');
	});
}
