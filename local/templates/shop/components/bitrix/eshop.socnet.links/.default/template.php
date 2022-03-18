<?

use Bitrix\Main\Diag\Debug;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

$this->setFrameMode(true);

?>


					<ul class="footer__socials socials">
						<? foreach($arResult["SOCSERV"] as $key => $socserv): ?>
							<? if($key === "FACEBOOK" && strlen($socserv["LINK"]) !== 0): ?>
								<li class="socials__item"><a href="<?= $socserv["LINK"] ?>" class="socials__name socials__name_fb"><span class="icon-facebook"></span></a>
							<? endif ?>
							<? if($key === "VKONTAKTE" && strlen($socserv["LINK"]) !== 0): ?>
								<li class="socials__item"><a href="<?= $socserv["LINK"] ?>" class="socials__name socials__name_vk"><span class="icon-vkontakte"></span></a>
								</li>
							<? endif ?>
							<? if($key === "TWITTER" && strlen($socserv["LINK"]) !== 0): ?>
								<li class="socials__item"><a href="<?= $socserv["LINK"] ?>" class="socials__name socials__name_tw"><span class="icon-twitter-bird"></span></a>
								</li>
							<? endif ?>
							<? if($key === "ODNOKLASSNIKI" && strlen($socserv) !== 0): ?>
								<li class="socials__item"><a href="<?= $socserv ?>" class="socials__name socials__name_ok"><span class="icon-odnoklassniki"></span></a>
								</li>
							<? endif ?>
						<? endforeach ?>
					</ul>


