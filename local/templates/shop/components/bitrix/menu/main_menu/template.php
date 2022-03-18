<?

use Bitrix\Vote\Base\Diag;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
	return;
?>

<nav class="header__nav navigation">
						<ul class="header__menu menu menu_width_full">
							<? foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns): ?>
							<li class="menu__item"><a href=" <?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>" class="menu__name"><?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?></a>
								<? if(count($arColumns) !== 0): ?>
								<ul class="dropdown-menu">
									<li class="dropdown-menu__content">
										<div class="dropdown-menu__img">
											<img src="<?= SITE_TEMPLATE_PATH . "/assets/images/header-submenu-1.jpg"?>" alt="девочка">
										</div>
										<div class="dropdown-menu__menu-col">
										<? foreach($arColumns as $key=>$arRow): ?>
											<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>
											<ul class="vertical-menu">
												<li class="vertical-menu__item"><span class="vertical-menu__name"><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?></span>
													<ul class="vertical-menu__submenu">
														<?foreach($arLevel_3 as $itemIdLevel_3):?>
															<li class="vertical-menu__submenu-item"><a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>" class="link vertical-menu__submenu-name"><?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?></a>
															</li>
														<? endforeach ?>
													</ul>
												</li>
											</ul>
											<? endforeach ?>
										<? endforeach ?>
										</div>
									</li>
								</ul>
								<? endif ?>
							</li>
								<? endforeach ?>
						</ul>
					</nav>
