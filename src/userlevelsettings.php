<?php
/**
 * PHPMaker 2021 user level settings
 */
namespace PHPMaker2021\webklinik;

// User level info
$USER_LEVELS = [["-2","Anonymous"]];
// User level priv info
$USER_LEVEL_PRIVS = [["{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_admin","-2","0"],
    ["{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_pasien","-2","0"],
    ["{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_pengunjung","-2","0"],
    ["{E63274EA-B05A-4256-9E24-4239AA7D192D}tb_periksa","-2","0"],
    ["{E63274EA-B05A-4256-9E24-4239AA7D192D}tbobat","-2","0"],
    ["{E63274EA-B05A-4256-9E24-4239AA7D192D}v_pengunjung_hariini","-2","0"],
    ["{E63274EA-B05A-4256-9E24-4239AA7D192D}v_pengunjung_thismonth","-2","0"]];
// User level table info
$USER_LEVEL_TABLES = [["tb_admin","tb_admin","tb admin",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","tbadminlist"],
    ["tb_pasien","tb_pasien","Pasien",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","tbpasienlist"],
    ["tb_pengunjung","tb_pengunjung","Pengunjung",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","tbpengunjunglist"],
    ["tb_periksa","tb_periksa","Periksa",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","tbperiksalist"],
    ["tbobat","tbobat","tbobat",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","tbobatlist"],
    ["v_pengunjung_hariini","v_pengunjung_hariini","Hari ini",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","vpengunjunghariinilist"],
    ["v_pengunjung_thismonth","v_pengunjung_thismonth","Bulan ini",true,"{E63274EA-B05A-4256-9E24-4239AA7D192D}","vpengunjungthismonthlist"]];
