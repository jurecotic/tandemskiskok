
function ajaxSubmitCommentForm(){
	"use strict";

	var options = { 
		success: function(){
			$j("#commentform textarea").val("");
			$j("#commentform .success p").text("Comment has been sent!");
		}
	}; 
	
	$j('#commentform').submit(function() {
		$j(this).find('input[type="submit"]').next('.success').remove();
		$j(this).find('input[type="submit"]').after('<div class="success"><p></p></div>');
		$j(this).ajaxSubmit(options); 
		return false; 
	}); 
}
var header_height = 82;
var min_header_height = 56;
var logo_height = header_height;
	
	logo_height = 130;
	




var geocoder;
var map;

function initialize() {
	"use strict";
  // Create an array of styles.
  var mapStyles = [
    {
      stylers: [
				{hue: "#324156" },
				{saturation: -60},
				{lightness: -20},
				{gamma: 1.51}
			]
    }
  ];
  var qodeMapType = new google.maps.StyledMapType(mapStyles,
    {name: "Qode Map"});

	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(-34.397, 150.644);
	var myOptions = {
		zoom: 8,
				scrollwheel: false,
				center: latlng,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_CENTER
		},
		scaleControl: false,
			scaleControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		streetViewControl: false,
			streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		panControl: false,
		panControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		mapTypeControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'qode_style'],
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
				mapTypeId: 'qode_style'
			};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	  map.mapTypes.set('qode_style', qodeMapType);
	}

function codeAddress(data) {
	"use strict";
	
	if (data === '')
		return;

	var contentString = '<div id="content">'+
	'<div id="siteNotice">'+
	'</div>'+
	'<div id="bodyContent">'+
	'<p>'+data+'</p>'+
	'</div>'+
	'</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	geocoder.geocode( { 'address': data}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map, 
				position: results[0].geometry.location,
								icon:  'https://www.tandemskiskok.si/wp-content/uploads/2014/01/pin.png',
								title: data['store_title']
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
			//infowindow.open(map,marker);
		}
	});
}

var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";

	showContactMap();
});

function showContactMap() {
	"use strict";

	if($j("#map_canvas").length > 0){
		initialize();
		codeAddress('');
		codeAddress('Letališče Bovec, Bovec, Tolmin, Slovenija');
		codeAddress('Letališče Slovenj Gradec, Mislinjska Dobrava, Slovenj Gradec, Slovenija');
		codeAddress('Airport Portorož (POW), Letališče Portorož, Slovenija');
		codeAddress('Alpski letalski center Lesce (ALC Lesce), Lesce, Radovljica, Slovenija');
	}
}

var no_ajax_pages = [];
var root = 'https://www.tandemskiskok.si/';
var theme_root = 'https://www.tandemskiskok.si/wp-content/themes/river/';
var parallax_speed = 1;


		no_ajax_pages.push('');
