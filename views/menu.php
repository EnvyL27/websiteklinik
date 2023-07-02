<?php

namespace PHPMaker2021\webklinik;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
    $MenuRelativePath = "";
    $MenuLanguage = &$Language;
} else { // Compat reports
    $LANGUAGE_FOLDER = "../lang/";
    $MenuRelativePath = "../";
    $MenuLanguage = Container("language");
}

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(8, "mci_Master_Data", $MenuLanguage->MenuPhrase("8", "MenuText"), "", -1, "", true, false, true, "", "", false);
$sideMenu->addMenuItem(2, "mi_tb_pasien", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "tbpasienlist", 8, "", IsLoggedIn() || AllowListMenu('{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_pasien'), false, false, "", "", false);
$sideMenu->addMenuItem(3, "mi_tb_pengunjung", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "tbpengunjunglist", 8, "", IsLoggedIn() || AllowListMenu('{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_pengunjung'), false, false, "", "", false);
$sideMenu->addMenuItem(4, "mi_tb_periksa", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "tbperiksalist", 8, "", IsLoggedIn() || AllowListMenu('{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_periksa'), false, false, "", "", false);
$sideMenu->addMenuItem(9, "mci_Pengunjung", $MenuLanguage->MenuPhrase("9", "MenuText"), "", -1, "", true, false, true, "", "", false);
$sideMenu->addMenuItem(6, "mi_v_pengunjung_hariini", $MenuLanguage->MenuPhrase("6", "MenuText"), $MenuRelativePath . "vpengunjunghariinilist", 9, "", IsLoggedIn() || AllowListMenu('{E63274EA-B05A-4256-9E24-4239AA7D192D}v_pengunjung_hariini'), false, false, "", "", false);
$sideMenu->addMenuItem(7, "mi_v_pengunjung_thismonth", $MenuLanguage->MenuPhrase("7", "MenuText"), $MenuRelativePath . "vpengunjungthismonthlist", 9, "", IsLoggedIn() || AllowListMenu('{E63274EA-B05A-4256-9E24-4239AA7D192D}v_pengunjung_thismonth'), false, false, "", "", false);
echo $sideMenu->toScript();
