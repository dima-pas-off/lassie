<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Diag\Debug;

;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CUser $USER
 * @var SaleOrderAjax $component
 * @var string $templateFolder
 */

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();

$arParams['ALLOW_USER_PROFILES'] = $arParams['ALLOW_USER_PROFILES'] === 'Y' ? 'Y' : 'N';
$arParams['SKIP_USELESS_BLOCK'] = $arParams['SKIP_USELESS_BLOCK'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['SHOW_ORDER_BUTTON']))
{
	$arParams['SHOW_ORDER_BUTTON'] = 'final_step';
}

$arParams['HIDE_ORDER_DESCRIPTION'] = isset($arParams['HIDE_ORDER_DESCRIPTION']) && $arParams['HIDE_ORDER_DESCRIPTION'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_TOTAL_ORDER_BUTTON'] = $arParams['SHOW_TOTAL_ORDER_BUTTON'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['BASKET_POSITION']) || !in_array($arParams['BASKET_POSITION'], array('before', 'after')))
{
	$arParams['BASKET_POSITION'] = 'after';
}

$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string)$arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] === 'Y' ? 'Y' : 'N';
$arParams['HIDE_DETAIL_PAGE_URL'] = isset($arParams['HIDE_DETAIL_PAGE_URL']) && $arParams['HIDE_DETAIL_PAGE_URL'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] === 'Y' ? 'Y' : 'N';

$arParams['SHOW_COUPONS'] = isset($arParams['SHOW_COUPONS']) && $arParams['SHOW_COUPONS'] === 'N' ? 'N' : 'Y';

if ($arParams['SHOW_COUPONS'] === 'N')
{
	$arParams['SHOW_COUPONS_BASKET'] = 'N';
	$arParams['SHOW_COUPONS_DELIVERY'] = 'N';
	$arParams['SHOW_COUPONS_PAY_SYSTEM'] = 'N';
}
else
{
	$arParams['SHOW_COUPONS_BASKET'] = isset($arParams['SHOW_COUPONS_BASKET']) && $arParams['SHOW_COUPONS_BASKET'] === 'N' ? 'N' : 'Y';
	$arParams['SHOW_COUPONS_DELIVERY'] = isset($arParams['SHOW_COUPONS_DELIVERY']) && $arParams['SHOW_COUPONS_DELIVERY'] === 'N' ? 'N' : 'Y';
	$arParams['SHOW_COUPONS_PAY_SYSTEM'] = isset($arParams['SHOW_COUPONS_PAY_SYSTEM']) && $arParams['SHOW_COUPONS_PAY_SYSTEM'] === 'N' ? 'N' : 'Y';
}

$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = isset($arParams['DELIVERIES_PER_PAGE']) ? intval($arParams['DELIVERIES_PER_PAGE']) : 9;
$arParams['PAY_SYSTEMS_PER_PAGE'] = isset($arParams['PAY_SYSTEMS_PER_PAGE']) ? intval($arParams['PAY_SYSTEMS_PER_PAGE']) : 9;
$arParams['PICKUPS_PER_PAGE'] = isset($arParams['PICKUPS_PER_PAGE']) ? intval($arParams['PICKUPS_PER_PAGE']) : 5;
$arParams['SHOW_PICKUP_MAP'] = $arParams['SHOW_PICKUP_MAP'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

$useDefaultMessages = !isset($arParams['USE_CUSTOM_MAIN_MESSAGES']) || $arParams['USE_CUSTOM_MAIN_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_BLOCK_NAME']))
{
	$arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage('AUTH_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REG_BLOCK_NAME']))
{
	$arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage('REG_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BASKET_BLOCK_NAME']))
{
	$arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage('BASKET_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_BLOCK_NAME']))
{
	$arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage('REGION_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAYMENT_BLOCK_NAME']))
{
	$arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage('PAYMENT_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_BLOCK_NAME']))
{
	$arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage('DELIVERY_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BUYER_BLOCK_NAME']))
{
	$arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage('BUYER_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BACK']))
{
	$arParams['MESS_BACK'] = Loc::getMessage('BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FURTHER']))
{
	$arParams['MESS_FURTHER'] = Loc::getMessage('FURTHER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_EDIT']))
{
	$arParams['MESS_EDIT'] = Loc::getMessage('EDIT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER']))
{
	$arParams['MESS_ORDER'] = $arParams['~MESS_ORDER'] = Loc::getMessage('ORDER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PRICE']))
{
	$arParams['MESS_PRICE'] = Loc::getMessage('PRICE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERIOD']))
{
	$arParams['MESS_PERIOD'] = Loc::getMessage('PERIOD_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_BACK']))
{
	$arParams['MESS_NAV_BACK'] = Loc::getMessage('NAV_BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_FORWARD']))
{
	$arParams['MESS_NAV_FORWARD'] = Loc::getMessage('NAV_FORWARD_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ADDITIONAL_MESSAGES']) || $arParams['USE_CUSTOM_ADDITIONAL_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRICE_FREE']))
{
	$arParams['MESS_PRICE_FREE'] = Loc::getMessage('PRICE_FREE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ECONOMY']))
{
	$arParams['MESS_ECONOMY'] = Loc::getMessage('ECONOMY_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGISTRATION_REFERENCE']))
{
	$arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage('REGISTRATION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_1']))
{
	$arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage('AUTH_REFERENCE_1_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_2']))
{
	$arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage('AUTH_REFERENCE_2_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_3']))
{
	$arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage('AUTH_REFERENCE_3_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ADDITIONAL_PROPS']))
{
	$arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage('ADDITIONAL_PROPS_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_USE_COUPON']))
{
	$arParams['MESS_USE_COUPON'] = Loc::getMessage('USE_COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_COUPON']))
{
	$arParams['MESS_COUPON'] = Loc::getMessage('COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERSON_TYPE']))
{
	$arParams['MESS_PERSON_TYPE'] = Loc::getMessage('PERSON_TYPE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PROFILE']))
{
	$arParams['MESS_SELECT_PROFILE'] = Loc::getMessage('SELECT_PROFILE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_REFERENCE']))
{
	$arParams['MESS_REGION_REFERENCE'] = Loc::getMessage('REGION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PICKUP_LIST']))
{
	$arParams['MESS_PICKUP_LIST'] = Loc::getMessage('PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NEAREST_PICKUP_LIST']))
{
	$arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage('NEAREST_PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PICKUP']))
{
	$arParams['MESS_SELECT_PICKUP'] = Loc::getMessage('SELECT_PICKUP_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_INNER_PS_BALANCE']))
{
	$arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage('INNER_PS_BALANCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER_DESC']))
{
	$arParams['MESS_ORDER_DESC'] = Loc::getMessage('ORDER_DESC_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ERROR_MESSAGES']) || $arParams['USE_CUSTOM_ERROR_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRELOAD_ORDER_TITLE']))
{
	$arParams['MESS_PRELOAD_ORDER_TITLE'] = Loc::getMessage('PRELOAD_ORDER_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SUCCESS_PRELOAD_TEXT']))
{
	$arParams['MESS_SUCCESS_PRELOAD_TEXT'] = Loc::getMessage('SUCCESS_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FAIL_PRELOAD_TEXT']))
{
	$arParams['MESS_FAIL_PRELOAD_TEXT'] = Loc::getMessage('FAIL_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TITLE']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage('DELIVERY_CALC_ERROR_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TEXT']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage('DELIVERY_CALC_ERROR_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']))
{
	$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] = Loc::getMessage('PAY_SYSTEM_PAYABLE_ERROR_DEFAULT');
}

$scheme = $request->isHttps() ? 'https' : 'http';

switch (LANGUAGE_ID)
{
	case 'ru':
		$locale = 'ru-RU'; break;
	case 'ua':
		$locale = 'ru-UA'; break;
	case 'tk':
		$locale = 'tr-TR'; break;
	default:
		$locale = 'en-US'; break;
}
$this->addExternalJs($templateFolder.'/order_ajax.js');
$this->addExternalJs($templateFolder.'/order_ajax_ext.js');
\Bitrix\Sale\PropertyValueCollection::initJs();
$this->addExternalJs($templateFolder.'/script.js');
?>
	<NOSCRIPT>
		<div style="color:red"><?=Loc::getMessage('SOA_NO_JS')?></div>
	</NOSCRIPT>
<?

if ($request->get('ORDER_ID') <> '')
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/confirm.php');
}
elseif ($arParams['DISABLE_BASKET_REDIRECT'] === 'Y' && $arResult['SHOW_EMPTY_BASKET'])
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	Main\UI\Extension::load('phone_auth');

	$themeClass = !empty($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
	$hideDelivery = empty($arResult['DELIVERY']);
	?>
	<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="ORDER_FORM" class="bx-soa-wrapper mb-4<?=$themeClass?>" id="bx-soa-order-form" enctype="multipart/form-data">
		<?
		echo bitrix_sessid_post();

		if ($arResult['PREPAY_ADIT_FIELDS'] <> '')
		{
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
		?>
		<input type="hidden" name="<?=$arParams['ACTION_VARIABLE']?>" value="saveOrderAjax">
		<input type="hidden" name="location_type" value="code">
		<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult['BUYER_STORE']?>">
		<div id="bx-soa-order" class="row" style="opacity: 0">
			<!--	MAIN BLOCK	-->
			<div class="col-lg-8 col-md-7 bx-soa">
				<div id="bx-soa-main-notifications">
					<div class="alert alert-danger" style="display:none"></div>
					<div data-type="informer" style="display:none"></div>
				</div>


				<div id="bx-soa-properties" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_BUYER_BLOCK_NAME']?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>



				<!--	AUTH BLOCK	-->
				<div id="bx-soa-auth" class="bx-soa-section bx-soa-auth" style="display: none;">
					<div class="bx-soa-section-title-container">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span>
							<?=$arParams['MESS_AUTH_BLOCK_NAME']?>
						</div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>

				<!--	DUPLICATE MOBILE ORDER SAVE BLOCK	-->
				<div id="bx-soa-total-mobile" style="margin-bottom: 6px;"></div>

				<? if ($arParams['BASKET_POSITION'] === 'before'): ?>
					<!--	BASKET ITEMS BLOCK	-->
					<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span>
								<?=$arParams['MESS_BASKET_BLOCK_NAME']?>
							</div>
							<div><a href="javascript:void(0)" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
				<? endif ?>

				<!--	REGION BLOCK	-->
				<div id="bx-soa-region" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_REGION_BLOCK_NAME']?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>

				<? if ($arParams['DELIVERY_TO_PAYSYSTEM'] === 'p2d'): ?>
					<!--	PAY SYSTEMS BLOCK	-->
					<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_PAYMENT_BLOCK_NAME']?>
							</div>
							<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
					<!--	DELIVERY BLOCK	-->
					<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?=($hideDelivery ? 'style="display:none"' : '')?>>
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_DELIVERY_BLOCK_NAME']?>
							</div>
							<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
					<!--	PICKUP BLOCK	-->
					<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span>
							</div>
							<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
				<? else: ?>
					<!--	DELIVERY BLOCK	-->
					<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?=($hideDelivery ? 'style="display:none"' : '')?>>
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_DELIVERY_BLOCK_NAME']?>
							</div>
							<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
					<!--	PICKUP BLOCK	-->
					<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span>
							</div>
							<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
					<!--	PAY SYSTEMS BLOCK	-->
					<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_PAYMENT_BLOCK_NAME']?>
							</div>
							<div><a href="" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
				<? endif ?>

				<? if ($arParams['BASKET_POSITION'] === 'after'): ?>
					<!--	BASKET ITEMS BLOCK	-->
					<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
						<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
							<div class="bx-soa-section-title" data-entity="section-title">
								<span class="bx-soa-section-title-count"></span><?=$arParams['MESS_BASKET_BLOCK_NAME']?>
							</div>
							<div><a href="javascript:void(0)" class="bx-soa-editstep"><?=$arParams['MESS_EDIT']?></a></div>
						</div>
						<div class="bx-soa-section-content"></div>
					</div>
				<? endif ?>

				<!--	ORDER SAVE BLOCK	-->
				<div id="bx-soa-orderSave">
					<div class="checkbox">
						<?
						if ($arParams['USER_CONSENT'] === 'Y')
						{
							$APPLICATION->IncludeComponent(
								'bitrix:main.userconsent.request',
								'',
								array(
									'ID' => $arParams['USER_CONSENT_ID'],
									'IS_CHECKED' => $arParams['USER_CONSENT_IS_CHECKED'],
									'IS_LOADED' => $arParams['USER_CONSENT_IS_LOADED'],
									'AUTO_SAVE' => 'N',
									'SUBMIT_EVENT_NAME' => 'bx-soa-order-save',
									'REPLACE' => array(
										'button_caption' => isset($arParams['~MESS_ORDER']) ? $arParams['~MESS_ORDER'] : $arParams['MESS_ORDER'],
										'fields' => $arResult['USER_CONSENT_PROPERTY_DATA']
									)
								)
							);
						}
						?>
					</div>
					<a href="javascript:void(0)" style="margin: 10px 0" class="btn btn-primary btn-lg d-none d-sm-inline-block" data-save-button="true">
						<?=$arParams['MESS_ORDER']?>
					</a>
				</div>

				<div style="display: none;">
					<div id='bx-soa-basket-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-region-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-paysystem-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-delivery-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-pickup-hidden' class="bx-soa-section"></div>
					<div id="bx-soa-properties-hidden" class="bx-soa-section"></div>
					<div id="bx-soa-auth-hidden" class="bx-soa-section">
						<div class="bx-soa-section-content reg"></div>
					</div>
				</div>
			</div>

			<!--	SIDEBAR BLOCK	-->
			<div id="bx-soa-total" class="col-lg-4 col-md-5 bx-soa-sidebar">
				<div class="bx-soa-cart-total-ghost"></div>
				<div class="bx-soa-cart-total"></div>
			</div>
		</div>
	</form>

	<div id="bx-soa-saved-files" style="display:none"></div>
	<div id="bx-soa-soc-auth-services" style="display:none">
		<?
		$arServices = false;
		$arResult['ALLOW_SOCSERV_AUTHORIZATION'] = Main\Config\Option::get('main', 'allow_socserv_authorization', 'Y') != 'N' ? 'Y' : 'N';
		$arResult['FOR_INTRANET'] = false;

		if (Main\ModuleManager::isModuleInstalled('intranet') || Main\ModuleManager::isModuleInstalled('rest'))
			$arResult['FOR_INTRANET'] = true;

		if (Main\Loader::includeModule('socialservices') && $arResult['ALLOW_SOCSERV_AUTHORIZATION'] === 'Y')
		{
			$oAuthManager = new CSocServAuthManager();
			$arServices = $oAuthManager->GetActiveAuthServices(array(
				'BACKURL' => $this->arParams['~CURRENT_PAGE'],
				'FOR_INTRANET' => $arResult['FOR_INTRANET'],
			));

			if (!empty($arServices))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:socserv.auth.form',
					'flat',
					array(
						'AUTH_SERVICES' => $arServices,
						'AUTH_URL' => $arParams['~CURRENT_PAGE'],
						'POST' => $arResult['POST'],
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
		}
		?>
	</div>

	<div style="display: none">
		<?
		// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.steps',
			'.default',
			array(),
			false
		);
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.search',
			'.default',
			array(),
			false
		);
		?>
	</div>
	<?
	$signer = new Main\Security\Sign\Signer;
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>
	<script>
		BX.message(<?=CUtil::PhpToJSObject($messages)?>);
		BX.Sale.OrderAjaxComponentExt.init({
			result: <?=CUtil::PhpToJSObject($arResult['JS_DATA'])?>,
			locations: <?=CUtil::PhpToJSObject($arResult['LOCATIONS'])?>,
			params: <?=CUtil::PhpToJSObject($arParams)?>,
			signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
			siteID: '<?=CUtil::JSEscape($component->getSiteId())?>',
			ajaxUrl: '<?=CUtil::JSEscape($component->getPath().'/ajax.php')?>',
			templateFolder: '<?=CUtil::JSEscape($templateFolder)?>',
			propertyValidation: true,
			showWarnings: true,
			pickUpMap: {
				defaultMapPosition: {
					lat: 55.76,
					lon: 37.64,
					zoom: 7
				},
				secureGeoLocation: false,
				geoLocationMaxTime: 5000,
				minToShowNearestBlock: 3,
				nearestPickUpsToShow: 3
			},
			propertyMap: {
				defaultMapPosition: {
					lat: 55.76,
					lon: 37.64,
					zoom: 7
				}
			},
			orderBlockId: 'bx-soa-order',
			authBlockId: 'bx-soa-auth',
			basketBlockId: 'bx-soa-basket',
			regionBlockId: 'bx-soa-region',
			paySystemBlockId: 'bx-soa-paysystem',
			deliveryBlockId: 'bx-soa-delivery',
			pickUpBlockId: 'bx-soa-pickup',
			propsBlockId: 'bx-soa-properties',
			totalBlockId: 'bx-soa-total'
		});
	</script>
	<script>
		<?
		// spike: for children of cities we place this prompt
		$city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
		?>
		BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
			'source' => $component->getPath().'/get.php',
			'cityTypeId' => intval($city['ID']),
			'messages' => array(
				'otherLocation' => '--- '.Loc::getMessage('SOA_OTHER_LOCATION'),
				'moreInfoLocation' => '--- '.Loc::getMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
				'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.Loc::getMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.Loc::getMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
						'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
						'#ANCHOR_END#' => '</a>'
					)).'</div>'
			)
		))?>);
	</script>
	<?
	if ($arParams['SHOW_PICKUP_MAP'] === 'Y' || $arParams['SHOW_MAP_IN_PROPS'] === 'Y')
	{
		if ($arParams['PICKUP_MAP_TYPE'] === 'yandex')
		{
			$this->addExternalJs($templateFolder.'/scripts/yandex_maps.js');
			$apiKey = htmlspecialcharsbx(Main\Config\Option::get('fileman', 'yandex_map_api_key', ''));
			?>
			<script src="<?=$scheme?>://api-maps.yandex.ru/2.1.50/?apikey=<?=$apiKey?>&load=package.full&lang=<?=$locale?>"></script>
			<script>
				(function bx_ymaps_waiter(){
					if (typeof ymaps !== 'undefined' && BX.Sale && BX.Sale.OrderAjaxComponentExt)
						ymaps.ready(BX.proxy(BX.Sale.OrderAjaxComponent.initMaps, BX.Sale.OrderAjaxComponentExt));
					else
						setTimeout(bx_ymaps_waiter, 100);
				})();
			</script>
			<?
		}

		if ($arParams['PICKUP_MAP_TYPE'] === 'google')
		{
			$this->addExternalJs($templateFolder.'/scripts/google_maps.js');
			$apiKey = htmlspecialcharsbx(Main\Config\Option::get('fileman', 'google_map_api_key', ''));
			?>
			<script async defer
				src="<?=$scheme?>://maps.googleapis.com/maps/api/js?key=<?=$apiKey?>&callback=bx_gmaps_waiter">
			</script>
			<script>
				function bx_gmaps_waiter()
				{
					if (BX.Sale && BX.Sale.OrderAjaxComponentExt)
						BX.Sale.OrderAjaxComponentExt.initMaps();
					else
						setTimeout(bx_gmaps_waiter, 100);
				}
			</script>
			<?
		}
	}

	if ($arParams['USE_YM_GOALS'] === 'Y')
	{
		?>
		<script>
			(function bx_counter_waiter(i){
				i = i || 0;
				if (i > 50)
					return;

				if (typeof window['yaCounter<?=$arParams['YM_GOALS_COUNTER']?>'] !== 'undefined')
					BX.Sale.OrderAjaxComponentExt.reachGoal('initialization');
				else
					setTimeout(function(){bx_counter_waiter(++i)}, 100);
			})();
		</script>
		<?
	}
}

?>




<main class="content order-page">
			<div class="container">
				<h1 class="title">???????????????????? ????????????</h1>
				<form class="form js-form-validate order-page__form">
					<fieldset class="form__fieldset">
						<legend class="form__title">???????????????????? ?? ????????????????????</legend>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-name" class="form__label">??????????????, ??????, ????????????????</label>
							</div>
							<div class="form__col form__col_width_375">
								<input id="order-name" name="Order[name]" required class="input" type="text">
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-mail" class="form__label">?????????????????????? ??????????</label>
							</div>
							<div class="form__col form__col_width_260">
								<input id="order-mail" name="Order[mail]" type="email" required class="input">
							</div>
							<div class="form__col">
								<div class="form__info">???? ???? ?????????????????? ???????? ?? ???? ???????????????? ???????????????????? ?????????????? ??????????</div>
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-phone" class="form__label">???????????????????? ??????????????</label>
							</div>
							<div class="form__col form__col_width_260">
								<input id="order-phone" name="Order[phone]" type="tel" required class="input">
								<div class="form__info">????????????????, 9051234567</div>
							</div>
							<div class="form__col">
								<div class="form__info">?????????????????? ?????? ?????????????????????????? ????????????</div>
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-city" class="form__label">??????????</label>
							</div>
							<div class="form__col form__col_width_260">
								<input id="order-city" name="Order[city]" required class="input" type="text">
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-street" class="form__label">??????????</label>
							</div>
							<div class="form__col form__col_width_260">
								<input id="order-street" name="Order[street]" required class="input" type="text">
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-postcode" class="form__label">???????????????? ????????????</label>
							</div>
							<div class="form__col form__col_width_260">
								<input id="order-postcode" name="Order[postcode]" required class="input" type="text">
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-house" class="form__label">?????????? ????????</label>
							</div>
							<div class="form__col form__col_width_90">
								<input id="order-house" name="Order[house]" required class="input" type="text">
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-housing" class="form__label">????????????</label>
							</div>
							<div class="form__col form__col_width_90">
								<input id="order-housing" name="Order[housing]" class="input" type="text">
							</div>
						</div>
						<div class="form__row">
							<div class="form__col form__col_width_220">
								<label for="order-apartment" class="form__label">?????????? ????????????????</label>
							</div>
							<div class="form__col form__col_width_90">
								<input id="order-apartment" name="Order[apartment]" class="input" type="text">
							</div>
						</div>
					</fieldset>
					<fieldset class="form__fieldset">
						<legend class="form__title">???????????? ????????????????</legend>
						<div class="form__row form__row_direction_column">
							<label class="form__label">???????????????????? ????????????????</label>
							<div class="form__info">???? 3 ???? 10 ?????????????? ???????? ?? ?????????????? ???????????????? ??????????????</div>
							<div class="form__checkbox-group">
								<div class="checkbox">
									<input id="order-delivery-1" name="Order[delivery]" type="checkbox" value="DHL" required class="checkbox__elem">
									<label for="order-delivery-1" class="checkbox__label form__label">DHL</label>
								</div>
								<div class="form__label">385 ??????.</div>
							</div>
							<div class="form__checkbox-group">
								<div class="checkbox">
									<input id="order-delivery-2" name="Order[delivery]" type="checkbox" value="DPD" required class="checkbox__elem">
									<label for="order-delivery-2" class="checkbox__label form__label">DPD</label>
								</div>
								<div class="form__label">355 ??????.</div>
							</div>
						</div>
						<div class="form__row form__row_direction_column">
							<label class="form__label">???????????????? ??????????????????????</label>
							<div class="form__checkbox-group">
								<div class="checkbox">
									<input id="order-delivery-3" name="Order[delivery]" type="checkbox" value="post" required class="checkbox__elem">
									<label for="order-delivery-3" class="checkbox__label form__label">?????????? ????????????</label>
								</div>
								<div class="form__label">200 ??????.</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="form__fieldset">
						<legend class="form__title">???????????? ????????????</legend>
						<div class="radio">
							<input id="order-payment-1" name="Order[payment]" type="radio" value="cash" required class="radio__elem">
							<label for="order-payment-1" class="form__label radio__label">?????????????????? ??????????????</label>
						</div>
						<div class="radio">
							<input id="order-payment-2" name="Order[payment]" type="radio" value="e-money" required class="radio__elem">
							<label for="order-payment-2" class="form__label radio__label">?????????????????????? ??????????????</label>
						</div>
					</fieldset>
					<fieldset class="form__fieldset">
						<legend class="form__title">???????????? ????????????</legend>
						<div class="goods-table">
							<div class="goods-table__header">
								<div class="goods-table__header-row">
									<div class="goods-table__heading">????????????</div>
									<div class="goods-table__heading">????????????</div>
									<div class="goods-table__heading">????????</div>
									<div class="goods-table__heading">????????????????????</div>
									<div class="goods-table__heading">??????????</div>
								</div>
							</div>
							<div class="goods-table__main">
								<? foreach($arResult["BASKET_ITEMS"] as $item): ?>
								<div class="goods-table__row">
									<div class="goods-table__cell">
										<div class="goods-table__col">
											<div class="goods-table__img-wrapper">
												<img src="<?= $item["DETAIL_PICTURE_SRC"] ?>" alt="" class="goods-table__img" >
												<? if($item["DISCOUNT_PRICE"] != 0): ?>
													<span class="flag flag_type_sale">sale</span>
												<? endif ?>	
											</div>
										</div>
										<div class="goods-table__col">
											<div class="goods-table__text"><?= $item["NAME"] ?></div>
											<div class="goods-table__info"><?= $item["PROPS"][0]["VALUE"] ?></div>
											<div class="goods-table__info">????????????: <?= $item["PROPS"][2]["VALUE"] ?></div>
										</div>
									</div>
									<? if($item["DISCOUNT_PRICE"] != 0): ?>
										<div class="goods-table__cell">
											<div class="goods-table__text goods-table__text_discount"><?= $item["DISCOUNT_PRICE_PERCENT"]?> %</div>
										</div>
									<? endif ?>
									<div class="goods-table__cell">
										<div class="goods-table__text"><?= $item["BASE_PRICE_FORMATED"] ?> ??????.</div>
									</div>
									<div class="goods-table__cell">
										<div class="goods-table__text"><?= $item["QUANTITY"] ?> ????.</div>
									</div>
									<div class="goods-table__cell">
										<? if($item["DISCOUNT_PRICE"] != 0): ?>
											<div class="goods-table__text goods-table__text_discount"><?= $item["PRICE_FORMATED"] ?> ??????.</div>
										<? else: ?>
											<div class="goods-table__text"><?= $item["PRICE_FORMATED"] ?> ??????.</div>
										<? endif ?>
									</div>
								</div>
								<? endforeach ?>
							</div>
						</div>
					</fieldset>
					<div class="form__total">
						<div class="form__col-right">
							<div class="form__total-row form__total-row_goods-cost"><span class="form__total-item">?????????????? ???? ??????????:</span><span class="form__total-item"><?= $arResult["JS_DATA"]["TOTAL"]["ORDER_TOTAL_PRICE"] ?> ??????.</span>
							</div>
							<div class="form__total-row form__total-row_tax"><span class="form__total-item">?? ?????? ?????????? ??????:</span><span class="form__total-item"><?= $arResult["JS_DATA"]["TOTAL"]["VAT_SUM"]?> ??????.</span>
							</div>
							<div class="form__total-row form__total-row_general"><span class="form__total-item">??????????</span>
								<div class="form__total-item form__total-item_sum"><?= $arResult["JS_DATA"]["TOTAL"]["ORDER_TOTAL_PRICE"] ?> ??????.</div>
							</div>
							<p>???????????????????? ?????????????????????????? ???????????? ???????????????? ?????????????????????? ?????? ???????????????????? ???????????? ?? ?????????????????????????? ????????????????. ?????? ???????????? ?????????????????? ???? ???????????????????? ????, ???????????????? ???????????????????????????????? ????.</p>
							<p>???????????????????????? ???????? ???????????????????????? ???????????? ?????? ???????????????????? ????????????, ?????????????????????? ???????? ???????????????? ???? ?????????????????? ???????? ???????????????????????? ????????????, ?? ?????????? ???? ?????????????????????? ???????????? ?????????????? ?? ?????????????????????????????? ?????????? ?? ???????????? ???????????????????? ???????????? ?? ???????????????????? ???????????????????????? ????????????????
								<a
								href="#" class="link">?????????????????????????????????? ????????????????????.</a>
							</p>
						</div>
					</div>
					<button type="submit" class="btn form__btn form__btn_align_right">???????????????? ??????????</button>
				</form>
			</div>
		</main>



		<? Debug::dump($arResult["JS_DATA"]["TOTAL"]) ?>
