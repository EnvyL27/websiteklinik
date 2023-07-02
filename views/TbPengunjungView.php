<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPengunjungView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftb_pengunjungview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ftb_pengunjungview = currentForm = new ew.Form("ftb_pengunjungview", "view");
    loadjs.done("ftb_pengunjungview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.tb_pengunjung) ew.vars.tables.tb_pengunjung = <?= JsonEncode(GetClientVar("tables", "tb_pengunjung")) ?>;
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
<form name="ftb_pengunjungview" id="ftb_pengunjungview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_pengunjung">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id->Visible) { // id ?>
    <tr id="r_id">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pengunjung_id"><?= $Page->id->caption() ?></span></td>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el_tb_pengunjung_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <tr id="r_id_pasien">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pengunjung_id_pasien"><?= $Page->id_pasien->caption() ?></span></td>
        <td data-name="id_pasien" <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_tb_pengunjung_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <tr id="r_tanggal">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pengunjung_tanggal"><?= $Page->tanggal->caption() ?></span></td>
        <td data-name="tanggal" <?= $Page->tanggal->cellAttributes() ?>>
<span id="el_tb_pengunjung_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
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
