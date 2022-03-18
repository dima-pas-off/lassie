<?

use Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<footer class="footer">
			<div class="container footer__container">
				<div class="footer__col">
					<h3 class="footer__title">
					<? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/include/title__bottom_left_menu.php",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	),
	false
);?>


					</h3>
					<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottomleft",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom"
	),
	false
);?>
				</div>
				<div class="footer__col">
					<h3 class="footer__title"><? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/include/title__bottom_middle_menu.php",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	),
	false
);?></h3>
					<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom_middle",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom"
	),
	false
);?>
				</div>
				<div class="footer__col">
					<h3 class="footer__title"><? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/include/title__bottom_right_menu.php",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	),
	false
);?></h3>
					<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom_right",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom"
	),
	false
);?>
				</div>
				<div class="footer__col">
					<h3 class="footer__title"><? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/include/title__social_links.php",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => ""
	),
	false
);?></h3>
<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.socnet.links", 
	".default", 
	array(
		"DESCRIPTION" => "",
		"FACEBOOK" => "#",
		"GOOGLE" => "",
		"INSTAGRAM" => "",
		"ODNOKLASSNIKI" => "#",
		"TITLE" => "",
		"TWITTER" => "#",
		"VKONTAKTE" => "#",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
				
					<p class="footer__text"><? $APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/include/description__social_links.php",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "standard.php"
	),
	false
);?></p>
				</div>
			</div>
			<div class="footer__bottom">
				<div class="container footer__container">
					<div class="footer__bottom-col">
						<p class="footer__text">Официальный интернет-магазин Lassie® в России</p>
					</div>
					<div class="footer__bottom-col">
						<div class="footer__text-group"><a href="tel:+78003331204" class="footer__text">8 (800) 333-12-04 </a><span class="footer__text">(горячая линия)</span>
						</div>
						<div class="footer__text-group"><a href="tel:+74952150435" class="footer__text">8 (495) 215-04-35 </a><span class="footer__text">(ежедневно с 9:00 до 24:00)</span>
						</div><a href="mailto:order@lassieshop.ru" class="footer__text footer__text_block">order@lassieshop.ru</a>
					</div>
				</div>
			</div>
		</footer>
		<? Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/scripts/app.min.js") ?>
	</body>
</html>