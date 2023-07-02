<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPasienView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftb_pasienview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ftb_pasienview = currentForm = new ew.Form("ftb_pasienview", "view");
    loadjs.done("ftb_pasienview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.tb_pasien) ew.vars.tables.tb_pasien = <?= JsonEncode(GetClientVar("tables", "tb_pasien")) ?>;
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
<form name="ftb_pasienview" id="ftb_pasienview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_pasien">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <tr id="r_id_pasien">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pasien_id_pasien"><?= $Page->id_pasien->caption() ?></span></td>
        <td data-name="id_pasien" <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_tb_pasien_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
    <tr id="r_nm_pasien">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pasien_nm_pasien"><?= $Page->nm_pasien->caption() ?></span></td>
        <td data-name="nm_pasien" <?= $Page->nm_pasien->cellAttributes() ?>>
<span id="el_tb_pasien_nm_pasien">
<span<?= $Page->nm_pasien->viewAttributes() ?>>
<?= $Page->nm_pasien->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
    <tr id="r_tgl_lahir">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pasien_tgl_lahir"><?= $Page->tgl_lahir->caption() ?></span></td>
        <td data-name="tgl_lahir" <?= $Page->tgl_lahir->cellAttributes() ?>>
<span id="el_tb_pasien_tgl_lahir">
<span<?= $Page->tgl_lahir->viewAttributes() ?>>
<?= $Page->tgl_lahir->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
    <tr id="r_alamat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pasien_alamat"><?= $Page->alamat->caption() ?></span></td>
        <td data-name="alamat" <?= $Page->alamat->cellAttributes() ?>>
<span id="el_tb_pasien_alamat">
<span<?= $Page->alamat->viewAttributes() ?>>
<?= $Page->alamat->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pekerjaan->Visible) { // pekerjaan ?>
    <tr id="r_pekerjaan">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pasien_pekerjaan"><?= $Page->pekerjaan->caption() ?></span></td>
        <td data-name="pekerjaan" <?= $Page->pekerjaan->cellAttributes() ?>>
<span id="el_tb_pasien_pekerjaan">
<span<?= $Page->pekerjaan->viewAttributes() ?>>
<?= $Page->pekerjaan->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
    <tr id="r_alergi">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_pasien_alergi"><?= $Page->alergi->caption() ?></span></td>
        <td data-name="alergi" <?= $Page->alergi->cellAttributes() ?>>
<span id="el_tb_pasien_alergi">
<span<?= $Page->alergi->viewAttributes() ?>>
<?= $Page->alergi->getViewValue() ?></span>
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
