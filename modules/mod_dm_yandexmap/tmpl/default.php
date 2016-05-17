<?php

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addScript('//api-maps.yandex.ru/2.1/?lang=ru_RU');
$cityList1 = json_decode($params->get('city_list1'));
$cityCount1 = count($cityList1->city_text1);
$cityLatitude1 = implode(',',$cityList1->city_latitude1);
$cityLongitude1 = implode(',',$cityList1->city_longitude1);
foreach($cityList1->city_text1 as $city_text1){
	$cityText1[] = trim($city_text1);
}
$cityText1 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText1))); 

$cityList2 = json_decode($params->get('city_list2'));
$cityCount2 = count($cityList2->city_text2);
$cityLatitude2 = implode(',',$cityList2->city_latitude2);
$cityLongitude2 = implode(',',$cityList2->city_longitude2);
foreach($cityList2->city_text2 as $city_text2){
	$cityText2[] = trim($city_text2);
}
$cityText2 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText2))); 

$cityList3 = json_decode($params->get('city_list3'));
$cityCount3 = count($cityList3->city_text3);
$cityLatitude3 = implode(',',$cityList3->city_latitude3);
$cityLongitude3 = implode(',',$cityList3->city_longitude3);
foreach($cityList3->city_text3 as $city_text3){
	$cityText3[] = trim($city_text3);
}
$cityText3 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText3))); 

$cityList4 = json_decode($params->get('city_list4'));
$cityCount4 = count($cityList4->city_text4);
$cityLatitude4 = implode(',',$cityList4->city_latitude4);
$cityLongitude4 = implode(',',$cityList4->city_longitude4);
foreach($cityList4->city_text4 as $city_text4){
	$cityText4[] = trim($city_text4);
}
$cityText4 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText4)));

$cityList5 = json_decode($params->get('city_list5'));
$cityCount5 = count($cityList5->city_text5);
$cityLatitude5 = implode(',',$cityList5->city_latitude5);
$cityLongitude5 = implode(',',$cityList5->city_longitude5);
foreach($cityList5->city_text5 as $city_text5){
	$cityText5[] = trim($city_text5);
}
$cityText5 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText5))); 

$cityList6 = json_decode($params->get('city_list6'));
$cityCount6 = count($cityList6->city_text6);
$cityLatitude6 = implode(',',$cityList6->city_latitude6);
$cityLongitude6 = implode(',',$cityList6->city_longitude6);
foreach($cityList6->city_text6 as $city_text6){
	$cityText6[] = trim($city_text6);
}
$cityText6 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText6))); 

$cityList7 = json_decode($params->get('city_list7'));
$cityCount7 = count($cityList7->city_text7);
$cityLatitude7 = implode(',',$cityList7->city_latitude7);
$cityLongitude7 = implode(',',$cityList7->city_longitude7);
foreach($cityList7->city_text7 as $city_text7){
	$cityText7[] = trim($city_text7);
}
$cityText7 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText7))); 

$cityList8 = json_decode($params->get('city_list8'));
$cityCount8 = count($cityList8->city_text8);
$cityLatitude8 = implode(',',$cityList8->city_latitude8);
$cityLongitude8 = implode(',',$cityList8->city_longitude8);
foreach($cityList8->city_text8 as $city_text8){
	$cityText8[] = trim($city_text8);
}
$cityText8 = str_replace(array("\r\n", "\r", "\n"), ' ', strip_tags(implode(',',$cityText8))); 
$addressId = 0;
?>

<div id="uk-dm-yandexmap" class="uk-dm-yandexmap uk-dm-yandexmap<?php echo $moduleclass_sfx ?>">
	<div id="uk-dm-yandexmap-anchor"></div>
	<div class="uk-yandexmap-title uk-h2 uk-text-bold"><?php echo $params->get('map_title');?></div>

	<div id="map" style="width:<?php echo $params->get('map_width');?>; height:<?php echo $params->get('map_height');?>"></div>
	<div class="uk-h2 uk-text-bold uk-map-address-block-title">
		<?php echo $params->get('city_block_title');?>
	</div>
	<div class="uk-accordion uk-map-address-block" data-uk-accordion="showfirst: false">
		
		<?php if($params->get('city1') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city1');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList1->city_text1 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList1->city_latitude1[$k]; ?>,<?php echo $cityList1->city_longitude1[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city2') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city2');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList2->city_text2 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList2->city_latitude2[$k]; ?>,<?php echo $cityList2->city_longitude2[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city3') != ''):?>		
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city3');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList3->city_text3 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList3->city_latitude3[$k]; ?>,<?php echo $cityList3->city_longitude3[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city4') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city4');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList4->city_text4 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList4->city_latitude4[$k]; ?>,<?php echo $cityList4->city_longitude4[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city5') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city5');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList5->city_text5 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList5->city_latitude5[$k]; ?>,<?php echo $cityList5->city_longitude5[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city8') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city6');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList6->city_text6 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList6->city_latitude6[$k]; ?>,<?php echo $cityList6->city_longitude6[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city7') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city7');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList7->city_text7 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList7->city_latitude7[$k]; ?>,<?php echo $cityList7->city_longitude7[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
		
		<?php if($params->get('city8') != ''):?>
		<div class="uk-accordion-title uk-margin-bottom-remove uk-text-large uk-text-bold"><span><?php echo $params->get('city8');?></span></div>
		<div class="uk-accordion-content">
			<?php 
			foreach($cityList8->city_text8 as $k => $cityText):?>
				<div class="uk-grid">
					<div class="uk-width-4-5">
						<?php  echo $cityText; ?>
					</div>
					<div class="uk-width-1-5 uk-text-right">
						<?php if ($params->get('show_on_map') != ''):?>
							<a class="uk-show-on-map" href="#" onclick="showOnMap(<?php echo $addressId; ?>,<?php echo $cityList8->city_latitude8[$k]; ?>,<?php echo $cityList8->city_longitude8[$k]; ?>); return false;"><?php echo JText::_("MODULE_YANDEXMAP_SHOWONMAP_LABEL"); ?></a>
						<?php endif;?>
					</div>
				</div>
			<?php $addressId++; ?>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
	</div>	

<script type="text/javascript">// <![CDATA[
var map;
var placemark = new Array();
ymaps.ready(init);

function init () {
    map = new ymaps.Map('map', {
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
                '<div class="uk-text-bold uk-margin-bottom-remove">{{properties.text}}</div>' +/*
                '<a class="uk-map-link" href="/{{properties.link}}">{{properties.link_text}}</a>' +*/
            '</div>', {
        });
	//map.behaviors.disable('scrollZoom');
	
	var cityLatitude1 = '<?php echo $cityLatitude1; ?>'.split(',');
	var cityLongitude1 = '<?php echo $cityLongitude1; ?>'.split(',');
	var cityText1 = '<?php echo $cityText1; ?>'.split(',');
	
	for(var i = 0; i < <?php echo $cityCount1; ?>; i++){
		if ((cityLatitude1[i] != '') && (cityLongitude1[i] != '')){
			placemark[i] = new ymaps.Placemark([cityLatitude1[i], cityLongitude1[i]], {
				text: cityText1[i]
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
			map.geoObjects.add(placemark[i]);
		}
	}
	
	var placemark2 = new Array();
	var count = i++;
	var cityLatitude2 = '<?php echo $cityLatitude2; ?>'.split(',');
	var cityLongitude2 = '<?php echo $cityLongitude2; ?>'.split(',');
	var cityText2 = '<?php echo $cityText2; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount2; ?>; i++){
		if ((cityLatitude2[i] != '') && (cityLongitude2[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude2[i], cityLongitude2[i]], {
				text: cityText2[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
	var cityLatitude3 = '<?php echo $cityLatitude3; ?>'.split(',');
	var cityLongitude3 = '<?php echo $cityLongitude3; ?>'.split(',');
	var cityText3 = '<?php echo $cityText3; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount3; ?>; i++){
		if ((cityLatitude3[i] != '') && (cityLongitude3[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude3[i], cityLongitude3[i]], {
				text: cityText3[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
	
	var cityLatitude4 = '<?php echo $cityLatitude4; ?>'.split(',');
	var cityLongitude4 = '<?php echo $cityLongitude4; ?>'.split(',');
	var cityText4 = '<?php echo $cityText4; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount4; ?>; i++){
		if ((cityLatitude4[i] != '') && (cityLongitude4[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude4[i], cityLongitude4[i]], {
				text: cityText4[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
	
	var cityLatitude5 = '<?php echo $cityLatitude5; ?>'.split(',');
	var cityLongitude5 = '<?php echo $cityLongitude5; ?>'.split(',');
	var cityText5 = '<?php echo $cityText5; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount5; ?>; i++){
		if ((cityLatitude5[i] != '') && (cityLongitude5[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude5[i], cityLongitude5[i]], {
				text: cityText5[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
	
	var cityLatitude6 = '<?php echo $cityLatitude6; ?>'.split(',');
	var cityLongitude6 = '<?php echo $cityLongitude6; ?>'.split(',');
	var cityText6 = '<?php echo $cityText6; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount6; ?>; i++){
		if ((cityLatitude6[i] != '') && (cityLongitude6[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude6[i], cityLongitude6[i]], {
				text: cityText6[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
	
	var cityLatitude7 = '<?php echo $cityLatitude7; ?>'.split(',');
	var cityLongitude7 = '<?php echo $cityLongitude7; ?>'.split(',');
	var cityText7 = '<?php echo $cityText7; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount6; ?>; i++){
		if ((cityLatitude7[i] != '') && (cityLongitude7[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude7[i], cityLongitude7[i]], {
				text: cityText7[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
	
	var cityLatitude8 = '<?php echo $cityLatitude8; ?>'.split(',');
	var cityLongitude8 = '<?php echo $cityLongitude8; ?>'.split(',');
	var cityText8 = '<?php echo $cityText8; ?>'.split(',');
	
	for(i = 0; i < <?php echo $cityCount8; ?>; i++){
		if ((cityLatitude8[i] != '') && (cityLongitude8[i] != '')){
			placemark[count] = new ymaps.Placemark([cityLatitude8[i], cityLongitude8[i]], {
				text: cityText8[i]
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
			map.geoObjects.add(placemark[count]);
			count++;
		}
	}
}
	
// ]]></script>

</div>
<script type="text/javascript">
	function showOnMap(id, latitude, longitude){
		map.setCenter([latitude,longitude]);
		placemark[id].balloon.open();
		jQuery('html, body').animate({scrollTop : jQuery('.uk-page-title').offset().top}, 500);
		return false;
	}
</script>