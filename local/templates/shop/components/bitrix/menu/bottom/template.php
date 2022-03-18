<?

use Bitrix\Main\Diag\Debug;

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
?>

<ul class="list">
    <? foreach($arResult as $arItem): ?>
						<li class="list__item"><a href="<?= $arItem["LINK"] ?>" class="footer__text"><?= $arItem["TEXT"] ?></a>
						</li>
    <? endforeach ?>
</ul>                        