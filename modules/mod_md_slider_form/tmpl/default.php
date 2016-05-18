<?php

defined('_JEXEC') or die;
//$doc = JFactory::getDocument();
//$doc->addScript('/templates/sth/warp/vendor/uikit/js/components/slider.js');
?>

<div class="uk-md-sliderform uk-md-sliderform-<?php echo $moduleclass_sfx ?>" >
	<?php  ?>
	<div class="uk-slidenav-position" data-uk-slideshow="{animation: 'scroll'}">
		<ul class="uk-slideshow">
			<li>
				<div class="uk-slide uk-position-relative" style="background-image: url(<?php echo $params->get('slide1-background'); ?>);">
					<div class="uk-slide-title-wrapper uk-position-absolute">
						<div class="uk-slide-title uk-text-contrast uk-text-bold uk-text-center uk-position-absolute"><?php echo $params->get('slide1-text'); ?></div>
					</div>
					<div class="uk-slide-button-wrapper uk-position-absolute">
						<a href="#" class="uk-slide-button uk-homeslide-button uk-grid uk-grid-collapse uk-clearfix" data-uk-slideshow-item="next">
							<div class="uk-width-1-5 uk-calculate-icon icon-calculator uk-position-relative">
							</div>
							<div class="uk-width-4-5 uk-button-text uk-slide-button-subtitle">
								<?php echo $params->get('slide1-button'); ?>
							</div>
						</a>
					</div>
				</div>
			</li>
			<li class="uk-calc-slide-2">
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide2-background'); ?>);">
					<div class="uk-slide-wrap">
						<a href="#" class="uk-slide-back" data-uk-slideshow-item="previous"><?php echo JText::_('MOD_MD_SLIDER_FORM_BACK'); ?></a>
						<div class="uk-slide-title-wrapper">
							<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide2-question'); ?></div>
						</div>
						<div class="">
							<div>
								<a href="#" class="uk-floors-less-3" data-uk-slideshow-item="next">
									<?php echo $params->get('slide2-answer1'); ?>
								</a>
							</div>
							<div>
								<a href="#" class="uk-floors-more-3" data-uk-slideshow-item="next">
									<?php echo $params->get('slide2-answer2'); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</li>	
			<li  class="uk-calc-slide-3">
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide3-background'); ?>);">
					<div class="uk-slide-title-wrapper">
						<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide3-question'); ?></div>
					</div>
					<div class="">
						<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
							<?php echo $params->get('slide3-answer1'); ?>
							<input id="wall-factor" type="hidden" value="1" />
						</a><br>
						<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
							<?php echo $params->get('slide3-answer2'); ?>
							<input id="wall-factor" type="hidden" value="1.1" />
						</a><br>
						<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
							<?php echo $params->get('slide3-answer3'); ?>
							<input id="wall-factor" type="hidden" value="0.8" />
						</a><br>
						<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
							<?php echo $params->get('slide3-answer4'); ?>
							<input id="wall-factor" type="hidden" value="1" />
						</a>
					</div>
				</div>
			</li>
			<li class="uk-calc-slide-4">	
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide4-background'); ?>);">
					<div class="uk-slide-title-wrapper">
						<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide3-question'); ?></div>
					</div>
					 
					<div class="uk-width-2-3 uk-container-center uk-margin-large-top">
						<div id="windowsill_height"></div>
						<div class="uk-windowsill-height-scale">
							<span>100</span>
							<span>200</span>
							<span>300</span>
							<span>400</span>
							<span>500</span>
							<span>600</span>
							<span>700</span>
							<span>800</span>
							<span>900</span>
							<span>1000</span>
							<span>1100</span>
							<span>1200</span>
							<span>1300</span>
						</div>
					</div>
					<div class="uk-float-right uk-text-bold uk-h2">
						<div id="windowsill_height_result" class="uk-inline-block">
						100
						</div>
						<div class="uk-inline-block">мм</div>
					</div>
					<script>
						jQuery("#windowsill_height").slider({
							min: 100,
							max: 1300,
							//range: true,
							step: 100,
							change: function( event, ui ) {
								var windowsillHeight = jQuery(this).slider( "value" );
								jQuery('#windowsill_height_result').html(windowsillHeight);
								//jQuery("#windowsill-height").val(windowsillHeight);
								if (windowsillHeight < 700){
									jQuery("#radiator-types").val('S350');
								} else {
									jQuery("#radiator-types").val('S80');
								}
							}
						});
						//alert();
					</script>
					<br>
					<br>
					<br>
					<br>
					<div class="">
						<a href="#" class="uk-slide-button uk-text-contrast uk-homeslide-button" data-uk-slideshow-item="next">
							Далее
						</a>
					</div>
				</div>
			</li>
			<li>
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide5-background'); ?>);">
					<div class="uk-slide-title-wrapper">
						<div class="uk-slide-title uk-text-bold uk-text-center"> Выясняем высоту потолка</div>
					</div>
					<div class="uk-width-2-3 uk-container-center uk-margin-large-top">
						<div id="ceiling-height"></div>
						<div class="uk-ceiling-height-scale">
							<span>2</span>
							<span>2.5</span>
							<span>3</span>
							<span>3.5</span>
							<span>4</span>
						</div>
					</div>
					<div class="uk-float-right uk-text-bold uk-h2">
						<div id="ceiling-height-result" class="uk-inline-block">
						2
						</div>
						<div class="uk-inline-block">м</div>
					</div>
					<script>
						jQuery("#ceiling-height").slider({
							min: 2,
							max: 4,
							//range: true,
							step: 0.5,
							change: function( event, ui ) {
								var ceilingHeight = jQuery(this).slider( "value" );
								jQuery('#ceiling-height-result').html(ceilingHeight);
								jQuery('#ceiling_height').val(ceilingHeight);
							}
						});
						//alert();
					</script>
					<br>
					<br>
					<br>
					<div class="">
						<a href="#" class="uk-slide-button uk-text-contrast uk-homeslide-button" data-uk-slideshow-item="next">
							Далее
						</a>
					</div>
				</div>
			</li>
			<li>
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide6-background'); ?>);">
					<div class="uk-slide-title-wrapper">
						<div class="uk-slide-title uk-text-bold uk-text-center"> Выясняем площадь комнаты</div>
					</div>
					<div class="uk-width-2-3 uk-container-center uk-margin-large-top">
						<div id="room-area"></div>
						<div class="uk-room-area-scale">
							<span>7</span>
							<span>10</span>
							<span>12</span>
							<span>15</span>
							<span>20</span>
							<span>25</span>
							<span>30</span>
							<span>35</span>
							<span>40</span>
						</div>
					</div>
					<div class="uk-float-right uk-text-bold uk-h2">
						<div id="room-area-result" class="uk-inline-block">
						7
						</div>
						<div class="uk-inline-block">м<sup>2</sup></div>
					</div>
					<script>
						jQuery("#room-area").slider({
							min: 7,
							max: 40,
							step: 5,
							change: function( event, ui ) {
								var roomArea = jQuery(this).slider( "value" );
								jQuery('#room-area-result').html(roomArea);
								jQuery('#room_area').val(roomArea);
							}
						});
					</script>
					<br>
					<br>
					<br>
					<div class="">
						<a href="#" class="uk-slide-button uk-text-contrast uk-homeslide-button" data-uk-slideshow-item="next">
							Далее
						</a>
					</div>
				</div>
			</li>
			<li>
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide7-background'); ?>);">
					<div class="uk-slide-title-wrapper">
						<div class="uk-slide-title uk-text-bold uk-text-center">Выясняем тип комнаты.</div>
					</div>
					<div class="">
						<a href="#" class="uk-room-type" data-uk-slideshow-item="next">
							угловая комната
							<input id="room-factor" type="hidden" value="1.3" />
						</a><br>
						<a href="#" class="uk-room-type" data-uk-slideshow-item="next">
							два окна
							<input id="room-factor" type="hidden" value="1.1" />
						</a><br>
						<a href="#" class="uk-room-type" data-uk-slideshow-item="next">
							более двух окон
							<input id="room-factor" type="hidden" value="1.2" />
						</a><br>
						<a href="#" class="uk-room-type" data-uk-slideshow-item="next">
							не угловая и 1 окно
							<input id="room-factor" type="hidden" value="1" />
						</a>
					</div>
				</div>
			</li>
			<li>
				<div class="uk-slide uk-position-relative" style="background-color: #ccc;">
					<div class="uk-slide-title-wrapper">
						<div class="uk-slide-title uk-text-bold uk-text-center">Результаты:</div>
						<div class="uk-h3 uk-text-bold uk-text-center">Вам подходит модель: <span class="uk-result-model uk-text-contrast"></span></div>
						<div class="uk-h3 uk-text-bold uk-text-center">секций: <span class="uk-result-sections uk-text-contrast"></span></div>
					</div>
					<div class="uk-claculate-result"></div>
					<div>* Пожалуйста, помните, что приведенный расчет является типовым, т.к. не может учитывать индивидуальные особенности Вашего помещения. Для корректировки полученных результатов, обращайтесь к профессиональным монтажным организациям</div>
				</div>
			</li>
		</ul>
	</div>
	<input id="radiator-types" type="hidden" value="S80,B80,S350" />
	<input id="windowsill-height" type="hidden" value="0" />
	<input id="wall-type-result" type="hidden" value="0" />
	<input id="ceiling_height" type="hidden" value="2" />
	<input id="room_area" type="hidden" value="7" />
	<input id="room_type" type="hidden" value="0" />
</div>
<script>
	jQuery(".uk-floors-more-3").click(function(){
		jQuery("#radiator-types").val('B80');
	});
	jQuery(".uk-floors-less-3").click(function(){
		jQuery("#radiator-types").val('S80,S350');
		jQuery("#windowsill-height").val('100');
	});
	jQuery(".uk-wall-type").click(function(){
		var wallFactor = jQuery(this).find("#wall-factor").val();
		jQuery("#wall-type-result").val(wallFactor);
	});
	jQuery(".uk-room-type").click(function(){	
		var roomFactor = jQuery(this).find("#room-factor").val();
		jQuery("#room_type").val(roomFactor);
		
		//result
		var model = jQuery("#radiator-types").val();
		var s = jQuery("#room_area").val();
		var h = jQuery("#ceiling_height").val();
		var k1 = jQuery("#wall-type-result").val();
		var k2 = jQuery("#room_type").val();
		var x = s*h*41;
		var sections = Math.ceil(((x/100) * k1) * k2);
		jQuery(".uk-result-model").html(model);
		jQuery(".uk-result-sections").html(sections);
		
		uk-claculate-result
	});
</script>