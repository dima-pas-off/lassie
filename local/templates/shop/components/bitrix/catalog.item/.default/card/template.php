<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Diag\Debug;
use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>



	<div class="good__content">
		<a href="<?= $item["DETAIL_PAGE_URL"] ?>"  class="good__link product-item-image-wrapper" data-entity="image-wrapper " >
			<span class="product-item-image-slider-slide-container slide" id="<?= $itemIds['PICT_SLIDER'] ?>">
			</span>
			<img class="good__img" id="<?= $itemIds['PICT'] ?>" />
		<? if ($price["PERCENT"] > 0) : ?>
				<span class="flag flag_type_sale">sale</span>
			<? endif ?>


			<?
			if ($item['LABEL'] && !$price["PERCENT"] > 0 )
		{
			?>
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					$code = array_key_first($item["LABEL_ARRAY_VALUE"]);
						switch($code) {
							case "NEWPRODUCT":
								?>

									<span class="flag flag_type_new">new</span>

								<?
								break;
							case "SALELEADER":
								?>
								
								<span class="flag flag_type_hit">hit</span>

								<?
								break;
						}
				}
				?>
			<?
		}
		?>
		
			<? if ($price["PERCENT"] > 0) : ?>
				<span class="flag flag_type_sale">sale</span>
			<? endif ?>


			<?
			if ($item['LABEL'] && !$price["PERCENT"] > 0 )
		{
			?>
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					$code = array_key_first($item["LABEL_ARRAY_VALUE"]);
						switch($code) {
							case "NEWPRODUCT":
								?>

									<span class="flag flag_type_new">new</span>

								<?
								break;
							case "SALELEADER":
								?>
								
								<span class="flag flag_type_hit">hit</span>

								<?
								break;
						}
				}
				?>
			<?
		}
		?>
		</a><a href="javascript:void(0);" class="like">Мне нравится</a>
		<h4 class="good__name"><?= $item["NAME"] ?></h4>
		<div class="good__price-wrapper" data-entity="price-block">
			<? if($price["PERCENT"] > 0): ?>
				<span class="good__price good__price_new" id="<?= $itemIds['PRICE'] ?>"> <?= $price['PRINT_RATIO_PRICE'] ?></span>
			<? else: ?>
				<span class="good__price" id="<?= $itemIds['PRICE'] ?>"> <?= $price['RATIO_PRICE'] ?></span>
			<? endif ?>	
			<span class="good__price good__price_old" id="<?= $itemIds["PRICE_OLD"] ?>"><?= $price['PRINT_RATIO_BASE_PRICE'] ?></span>
			<? if ($price["PERCENT"] > 0) : ?>
				<span class="good__discount">Скидка: <?= $price["PERCENT"] ?>%</span>
			<? endif ?>
		</div>
	</div>
	<div class="good__hover">
		<form method="post" action="" class="form good__order">
			<div class="good__order-row" id="<?= $itemIds['PROP_DIV'] ?>">

				<label class="good__order-label">Выберите размер</label>
				<? foreach ($arParams['SKU_PROPS'] as $skuProperty) :
					$propertyId = $skuProperty['ID'];
					$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
					if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
					if ($skuProperty["CODE"] === "COLOR_REF") continue;
					foreach ($skuProperty['VALUES'] as $value) : ?>
						<? if($value["NAME"] === '-') continue ?>
						
						<div class="checkbox-tile">
							<input <?= !isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]) ? "disabled" : ''?> name="Good[size]" id="good6-size0" type="radio" value="74" required class="checkbox-tile__elem">
							<label data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>" data-onevalue="<?= $value['ID'] ?>" for="good6-size0" class="checkbox-tile__label"><?= $value["NAME"] ?></label>
						</div>
					<? endforeach ?>
				<? endforeach ?>
			</div>

			<div class="good__order-row product-item-hidden" data-entity="quantity-block">
				<label for="good0-num" class="good__order-label">Количество</label>
				<div class="input-number">
					<input id="<?= $itemIds['QUANTITY'] ?>" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" type="number" value="<?= $measureRatio ?>" class="input-number__elem">
					<div class="input-number__counter"><span id="<?= $itemIds["QUANTITY_UP"] ?>" class="input-number__counter-spin input-number__counter-spin_more">Больше</span><span id="<?= $itemIds["QUANTITY_DOWN"] ?>" class="input-number__counter-spin input-number__counter-spin_less">Меньше</span>
					</div>
				</div>
			</div>


			<div id="<?= $itemIds['BASKET_ACTIONS'] ?>">
				<button id="<?= $itemIds["BUY_LINK"] ?>" type="submit" class="btn">Добавить в корзину</button>
			</div>
		</form>
	</div>



<?
if (!empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
	foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
		switch ($blockName) {

			case 'sku':
				if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP'])) {
					foreach ($arParams['SKU_PROPS'] as $skuProperty) {
						if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
							continue;

						$skuProps[] = array(
							'ID' => $skuProperty['ID'],
							'SHOW_MODE' => $skuProperty['SHOW_MODE'],
							'VALUES' => $skuProperty['VALUES'],
							'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
						);
					}

					unset($skuProperty, $value);

					if ($item['OFFERS_PROPS_DISPLAY']) {
						foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer) {
							$strProps = '';

							if (!empty($jsOffer['DISPLAY_PROPERTIES'])) {
								foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty) {
									$strProps .= '<dt>' . $displayProperty['NAME'] . '</dt><dd>'
										. (is_array($displayProperty['VALUE'])
											? implode(' / ', $displayProperty['VALUE'])
											: $displayProperty['VALUE'])
										. '</dd>';
								}
							}

							$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
						}
						unset($jsOffer, $strProps);
					}
				}

				break;
		}
	}
}

?>