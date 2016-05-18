<?php

defined('_JEXEC') or die;
//$doc = JFactory::getDocument();
//$doc->addScript('/templates/sth/warp/vendor/uikit/js/components/slider.js');
$answer1Arr = json_decode($params->get('answer1'))->var_answer;
$answer2Arr = json_decode($params->get('answer2'))->var_answer;
?>

<div class="uk-md-sliderform uk-md-sliderform-<?php echo $moduleclass_sfx ?>" >
	<?php  ?>
	<div class="uk-slidenav-position" data-uk-slideshow="{animation: 'scroll'}">
		<ul class="uk-slideshow">
			<!--<li>
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
						<div class="uk-slide-chose"><div class="uk-slide-chose-text"><?php echo JText::_('MOD_MD_SLIDER_FORM_CHOSE'); ?></div></div>
						<div class="clearfix uk-slide-answer-blocks">
							<div class="uk-slide-answer-block" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide2-answer1-back'); ?>);">
								<div class="uk-slide-shadow-overlay"></div>
								<div class="uk-floors-more-3" data-uk-slideshow-item="next">
									<div class="uk-slide-answer-text"><?php echo $params->get('slide2-answer1'); ?></div>
									<a href="#" data-uk-slideshow-item="next"><?php echo JText::_('MOD_MD_SLIDER_FORM_NEXT'); ?></a>
								</div>								
							</div>
							<div class="uk-slide-answer-block" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide2-answer2-back'); ?>);">
								<div class="uk-slide-shadow-overlay"></div>
								<div class="uk-floors-more-3" data-uk-slideshow-item="next">
									<div class="uk-slide-answer-text"><?php echo $params->get('slide2-answer2'); ?></div>
									<a href="#" data-uk-slideshow-item="next"><?php echo JText::_('MOD_MD_SLIDER_FORM_NEXT'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li  class="uk-calc-slide-3">
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide3-background'); ?>);">
					<div class="uk-slide-wrap" style="background-image: url(<?php echo $params->get('slide3-background-wrap'); ?>);">
						<div class="uk-slide-wrap-shadow">
							<a href="#" class="uk-slide-back" data-uk-slideshow-item="previous"><?php echo JText::_('MOD_MD_SLIDER_FORM_BACK'); ?></a>
							<div class="uk-slide-title-wrapper">
								<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide3-question'); ?></div>
							</div>
							<div class="uk-slide-answers clearfix">
								<div class="uk-slide-answer">
									<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
										<?php echo $params->get('slide3-answer1'); ?>
										<input id="wall-factor" type="hidden" value="1" />
									</a>
								</div>
								<div class="uk-slide-answer">
									<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
										<?php echo $params->get('slide3-answer2'); ?>
										<input id="wall-factor" type="hidden" value="1.1" />
									</a>
								</div>
								<div class="uk-slide-answer">
									<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
										<?php echo $params->get('slide3-answer3'); ?>
										<input id="wall-factor" type="hidden" value="0.8" />
									</a>
								</div>
								<div class="uk-slide-answer">
									<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
										<?php echo $params->get('slide3-answer4'); ?>
										<input id="wall-factor" type="hidden" value="1" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li  class="uk-calc-slide-4">
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide4-background'); ?>);">
					<div class="uk-slide-wrap" style="background-image: url(<?php echo $params->get('slide4-background-wrap'); ?>);">
						<div class="uk-slide-wrap-shadow">
							<a href="#" class="uk-slide-back" data-uk-slideshow-item="previous"><?php echo JText::_('MOD_MD_SLIDER_FORM_BACK'); ?></a>
							<div class="uk-slide-title-wrapper">
								<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide4-question'); ?></div>
							</div>
							<div class="uk-container-center clearfix">
								<div class="uk-slide-block">
									<div class="uk-slide-block-title"><?php echo $params->get('slide4-answer1'); ?></div>
									<div class="uk-slide-room-area">
										<div class="room-area-result"><input maxlength="2" id="room-area-active" type="text" value="<?php echo $params->get('slide4-answer1-min'); ?>"> <span class="uk-inline-block"><?php echo $params->get('slide4-answer1-unit'); ?></span></div>
										<div id="room-area"></div>		
									</div>									
								</div>
								<div class="uk-slide-block">
									<div class="uk-slide-block-title"><?php echo $params->get('slide4-answer2'); ?></div>
									<div class="uk-slide-room-area">
										<div class="room-area-result"><input maxlength="2" id="roof-height-active" type="text" value="<?php echo $params->get('slide4-answer2-min'); ?>"> <span class="uk-inline-block"><?php echo $params->get('slide4-answer2-unit'); ?></span></div>
										<div id="roof-height"></div>	
									</div>
								</div>
							</div>
							<script>
								jQuery("#room-area").slider({
									min: <?php echo $params->get('slide4-answer1-min'); ?>,
									max: <?php echo $params->get('slide4-answer1-max'); ?>,
									step: <?php echo $params->get('slide4-answer1-step'); ?>,
									slide: function( event, ui ) {
										jQuery("#room-area-active").val(ui['value']);
									}
								});
								jQuery("#room-area-active").keyup(function() {
									jQuery("#room-area").slider("value", [jQuery("#room-area-active").val()]);
								});
								jQuery("#roof-height").slider({
									min: <?php echo $params->get('slide4-answer2-min'); ?>,
									max: <?php echo $params->get('slide4-answer2-max'); ?>,
									step: <?php echo $params->get('slide4-answer2-step'); ?>,
									slide: function( event, ui ) {
										jQuery("#roof-height-active").val(ui['value']);
									}
								});
								jQuery("#roof-height-active").keyup(function() {
									jQuery("#roof-height").slider("value", [jQuery("#room-area-active").val()]);
								});
							</script>
							<div class="uk-slide-answer">
								<a href="#" data-uk-slideshow-item="next"><?php echo JText::_('MOD_MD_SLIDER_FORM_NEXT'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="uk-calc-slide-5">	
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide5-background'); ?>);">
					<div class="uk-slide-wrap" style="background-image: url(<?php echo $params->get('slide5-background-wrap'); ?>);">
						<div class="uk-slide-wrap-shadow">
							<a href="#" class="uk-slide-back" data-uk-slideshow-item="previous"><?php echo JText::_('MOD_MD_SLIDER_FORM_BACK'); ?></a>
							<div class="uk-slide-title-wrapper">
								<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide5-question'); ?></div>
							</div>
							<div class="uk-slide-answers clearfix">
								<div class="uk-slide-answer">
									<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
										<?php echo $params->get('slide5-answer1'); ?>
										<input id="wall-factor" type="hidden" value="1" />
									</a>
								</div>
								<div class="uk-slide-answer">
									<a href="#" class="uk-wall-type" data-uk-slideshow-item="next">
										<?php echo $params->get('slide5-answer2'); ?>
										<input id="wall-factor" type="hidden" value="1.1" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>-->
			<li class="uk-calc-slide-6">
				<div class="uk-slide uk-position-relative" style="background-color: #ccc; background-image: url(<?php echo $params->get('slide6-background'); ?>);">
					<div class="uk-slide-wrap" style="background-image: url(<?php echo $params->get('slide6-background-wrap'); ?>);">
						<div class="uk-slide-wrap-shadow">
							<a href="#" class="uk-slide-back" data-uk-slideshow-item="previous"><?php echo JText::_('MOD_MD_SLIDER_FORM_BACK'); ?></a>
							<div class="uk-slide-title-wrapper">
								<div class="uk-slide-title uk-text-bold uk-text-center"><?php echo $params->get('slide6-question'); ?></div>
							</div>
							<div class="uk-container-center clearfix">
								<div class="uk-slide-block">
									<div class="uk-slide-block-title"><?php echo $params->get('slide6-answer1'); ?></div>
									<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
										<button class="uk-dropdown-button"><?php echo $answer1Arr[0]; ?></button>
										<div class="uk-dropdown uk-dropdown-bottom" style="top: 30px; left: 0px;">
											<ul class="uk-nav uk-nav-dropdown">
												<?php foreach ($answer1Arr as $answer) { ?>
													<li><?php echo $answer; ?></li>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>
								<div class="uk-slide-block">
									<div class="uk-slide-block-title"><?php echo $params->get('slide6-answer2'); ?></div>
									<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}" aria-haspopup="true" aria-expanded="false">
										<button class="uk-dropdown-button"><?php echo $answer2Arr[1]; ?></button>
										<div class="uk-dropdown uk-dropdown-bottom" style="top: 30px; left: 0px;">
											<ul class="uk-nav uk-nav-dropdown">
												<?php foreach ($answer2Arr as $answer) { ?>
													<li><?php echo $answer; ?></li>
												<?php } ?>
											</ul>
										</div>
									 </div>
								</div>
								<div class="uk-slide-answer">
									<a href="#" data-uk-slideshow-item="next"><?php echo JText::_('MOD_MD_SLIDER_FORM_NEXT'); ?></a>
								</div>
							 </div>
						</div>
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