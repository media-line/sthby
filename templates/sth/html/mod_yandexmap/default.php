<?php

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addScript('//api-maps.yandex.ru/2.1/?lang=ru_RU');
//$doc->addScript('//yandex.st/jquery/1.8.0/jquery.min.js');
$markersList = json_decode($params->get('markers_list'));
$markersCount = count($markersList->marker_latitude);
$markerLatitude = implode(',',$markersList->marker_latitude);
$markerLongitude = implode(',',$markersList->marker_longitude);
$markerLink = implode(',',$markersList->marker_link);
foreach($markersList->marker_text as $marker_text){
	$markerText[] = trim($marker_text);
}
$markerText = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$markerText))); 
?>

<div class="uk-yandexmap uk-yandexmap<?php echo $moduleclass_sfx ?>">
<div class="uk-yandexmap-title uk-h2 uk-text-bold"><?php echo $params->get('map_title');?></div>
<script type="text/javascript">// <![CDATA[
ymaps.ready(init);

function init () {
    var map = new ymaps.Map('map', {
            center: [<?php echo $params->get('latitude');?>, <?php echo $params->get('longitude');?>],
            zoom: <?php echo $params->get('zoom');?>,
			controls: ['zoomControl', 'searchControl', 'typeSelector', 'geolocationControl', 'trafficControl', 'fullscreenControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),
        counter = 0,
		
        // Создание макета содержимого балуна.
        // Макет создается с помощью фабрики макетов с помощью текстового шаблона.
        BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="margin:10px;">' +
                '<div class="uk-text-bold uk-margin-small-bottom">{{properties.text}}</div>' +/*
                '<a class="uk-map-link" href="/{{properties.link}}">{{properties.link_text}}</a>' +*/
            '</div>', {
        });
	//map.behaviors.disable('scrollZoom');
	var placemark = new Array();
	var markerLatitude = '<?php echo $markerLatitude; ?>'.split(',');
	var markerLongitude = '<?php echo $markerLongitude; ?>'.split(',');
	var markerText = '<?php echo $markerText; ?>'.split(',');
	var markerLink = '<?php echo $markerLink; ?>'.split(',');
	
	for(var i = 0; i < <?php echo $markersCount; ?>; i++){
		if ((markerLatitude[i] != '') && (markerLongitude[i] != '')){
			placemark[i] = new ymaps.Placemark([markerLatitude[i], markerLongitude[i]], {
				text: markerText[i],
				link: markerLink[i],
				link_text: '<?php echo $params->get('marker_link_text');?>'
			}, {
				balloonContentLayout: BalloonContentLayout,
				// Запретим замену обычного балуна на балун-панель.
				// Если не указывать эту опцию, на картах маленького размера откроется балун-панель.
				//balloonPanelMaxMapArea: 0,
				iconLayout: 'default#image',
				iconImageHref: '/<?php echo $params->get('marker_image');?>',
				iconImageSize: [<?php echo $params->get('marker_width');?>, <?php echo $params->get('marker_height');?>],
				iconImageOffset: [<?php echo $params->get('marker_offset_x');?>, <?php echo $params->get('marker_offset_y');?>]
			});
		}
		map.geoObjects.add(placemark[i]);
	}
}
// ]]></script>
	<div id="map" style="width:<?php echo $params->get('map_width');?>; height:<?php echo $params->get('map_height');?>"></div>
</div>
