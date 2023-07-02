<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbobatView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftbobatview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ftbobatview = currentForm = new ew.Form("ftbobatview", "view");
    loadjs.done("ftbobatview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.tbobat) ew.vars.tables.tbobat = <?= JsonEncode(GetClientVar("tables", "tbobat")) ?>;
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
<form name="ftbobatview" id="ftbobatview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tbobat">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_obat->Visible) { // id_obat ?>
    <tr id="r_id_obat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tbobat_id_obat"><?= $Page->id_obat->caption() ?></span></td>
        <td data-name="id_obat" <?= $Page->id_obat->cellAttributes() ?>>
<span id="el_tbobat_id_obat">
<span<?= $Page->id_obat->viewAttributes() ?>>
<?= $Page->id_obat->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nm_obat->Visible) { // nm_obat ?>
    <tr id="r_nm_obat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tbobat_nm_obat"><?= $Page->nm_obat->caption() ?></span></td>
        <td data-name="nm_obat" <?= $Page->nm_obat->cellAttributes() ?>>
<span id="el_tbobat_nm_obat">
<span<?= $Page->nm_obat->viewAttributes() ?>>
<?= $Page->nm_obat->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->harga_obat->Visible) { // harga_obat ?>
    <tr id="r_harga_obat">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tbobat_harga_obat"><?= $Page->harga_obat->caption() ?></span></td>
        <td data-name="harga_obat" <?= $Page->harga_obat->cellAttributes() ?>>
<span id="el_tbobat_harga_obat">
<span<?= $Page->harga_obat->viewAttributes() ?>>
<?= $Page->harga_obat->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
    <tr id="r_stok">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tbobat_stok"><?= $Page->stok->caption() ?></span></td>
        <td data-name="stok" <?= $Page->stok->cellAttributes() ?>>
<span id="el_tbobat_stok">
<span<?= $Page->stok->viewAttributes() ?>>
<?= $Page->stok->getViewValue() ?></span>
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
