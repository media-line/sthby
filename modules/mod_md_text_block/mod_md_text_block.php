<?php

defined('_JEXEC') or die;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$title = $params->get('title');
$text = $params->get('text');
//$showLink = $params->get('show_link');
$linkText = $params->get('link_text');
$link = $params->get('link');
$linkText2 = $params->get('link_text2');
$link2 = $params->get('link2');

$application = JFactory::getApplication();
$menu = $application->getMenu();
$url = $menu->getItem($link)->alias;
$url2 = $menu->getItem($link2)->alias;

$image = $params->get('image');
$imageAlign = $params->get('image_align');

$enableTitleLink = $params->get('enable_title_link');
$titleLink = $params->get('title_link');
$titleUrl = $menu->getItem($titleLink)->alias;

require JModuleHelper::getLayoutPath('mod_md_text_block', $params->get('layout', 'default'));
