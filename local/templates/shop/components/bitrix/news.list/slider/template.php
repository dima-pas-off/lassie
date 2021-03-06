<?

use Bitrix\Main\Diag\Debug;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<div class="index__slider slider">
				<ul class="slider__container">
					<? foreach($arResult["ITEMS"] as $item): ?>
						<li class="slider__item">
							<img src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="" class="slider__img">
							<div class="index__slider-title"><?= $item["NAME"] ?>
						</li>
					<? endforeach ?>
				</ul>
			</div>