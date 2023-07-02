<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPeriksaView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftb_periksaview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ftb_periksaview = currentForm = new ew.Form("ftb_periksaview", "view");
    loadjs.done("ftb_periksaview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.tb_periksa) ew.vars.tables.tb_periksa = <?= JsonEncode(GetClientVar("tables", "tb_periksa")) ?>;
</script>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if (!$Page->IsModal) { ?>
<?php if (!$Page->isExport()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
<div class="clearfix"></div>
</form>
<?php } ?>
<?php } ?>
<form name="ftb_periksaview" id="ftb_periksaview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_periksa">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_tb_periksa_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <tr id="r_id_pasien">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_id_pasien"><?= $Page->id_pasien->caption() ?></span></td>
        <td data-name="id_pasien" <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_tb_periksa_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <tr id="r_tanggal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_tanggal"><?= $Page->tanggal->caption() ?></span></td>
        <td data-name="tanggal" <?= $Page->tanggal->cellAttributes() ?>>
<span id="el_tb_periksa_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->keluhan->Visible) { // keluhan ?>
    <tr id="r_keluhan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_keluhan"><?= $Page->keluhan->caption() ?></span></td>
        <td data-name="keluhan" <?= $Page->keluhan->cellAttributes() ?>>
<span id="el_tb_periksa_keluhan">
<span<?= $Page->keluhan->viewAttributes() ?>>
<?= $Page->keluhan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
    <tr id="r_diagnosa">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_diagnosa"><?= $Page->diagnosa->caption() ?></span></td>
        <td data-name="diagnosa" <?= $Page->diagnosa->cellAttributes() ?>>
<span id="el_tb_periksa_diagnosa">
<span<?= $Page->diagnosa->viewAttributes() ?>>
<?= $Page->diagnosa->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->terapi->Visible) { // terapi ?>
    <tr id="r_terapi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_terapi"><?= $Page->terapi->caption() ?></span></td>
        <td data-name="terapi" <?= $Page->terapi->cellAttributes() ?>>
<span id="el_tb_periksa_terapi">
<span<?= $Page->terapi->viewAttributes() ?>>
<?= $Page->terapi->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->hasilPeriksa->Visible) { // hasilPeriksa ?>
    <tr id="r_hasilPeriksa">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_hasilPeriksa"><?= $Page->hasilPeriksa->caption() ?></span></td>
        <td data-name="hasilPeriksa" <?= $Page->hasilPeriksa->cellAttributes() ?>>
<span id="el_tb_periksa_hasilPeriksa">
<span<?= $Page->hasilPeriksa->viewAttributes() ?>>
<?= $Page->hasilPeriksa->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tarif->Visible) { // tarif ?>
    <tr id="r_tarif">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_periksa_tarif"><?= $Page->tarif->caption() ?></span></td>
        <td data-name="tarif" <?= $Page->tarif->cellAttributes() ?>>
<span id="el_tb_periksa_tarif">
<span<?= $Page->tarif->viewAttributes() ?>>
<?= $Page->tarif->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
