<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbobatDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftbobatdelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    ftbobatdelete = currentForm = new ew.Form("ftbobatdelete", "delete");
    loadjs.done("ftbobatdelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.tbobat) ew.vars.tables.tbobat = <?= JsonEncode(GetClientVar("tables", "tbobat")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftbobatdelete" id="ftbobatdelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tbobat">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->id_obat->Visible) { // id_obat ?>
        <th class="<?= $Page->id_obat->headerCellClass() ?>"><span id="elh_tbobat_id_obat" class="tbobat_id_obat"><?= $Page->id_obat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nm_obat->Visible) { // nm_obat ?>
        <th class="<?= $Page->nm_obat->headerCellClass() ?>"><span id="elh_tbobat_nm_obat" class="tbobat_nm_obat"><?= $Page->nm_obat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->harga_obat->Visible) { // harga_obat ?>
        <th class="<?= $Page->harga_obat->headerCellClass() ?>"><span id="elh_tbobat_harga_obat" class="tbobat_harga_obat"><?= $Page->harga_obat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
        <th class="<?= $Page->stok->headerCellClass() ?>"><span id="elh_tbobat_stok" class="tbobat_stok"><?= $Page->stok->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->id_obat->Visible) { // id_obat ?>
        <td <?= $Page->id_obat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tbobat_id_obat" class="tbobat_id_obat">
<span<?= $Page->id_obat->viewAttributes() ?>>
<?= $Page->id_obat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nm_obat->Visible) { // nm_obat ?>
        <td <?= $Page->nm_obat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tbobat_nm_obat" class="tbobat_nm_obat">
<span<?= $Page->nm_obat->viewAttributes() ?>>
<?= $Page->nm_obat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->harga_obat->Visible) { // harga_obat ?>
        <td <?= $Page->harga_obat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tbobat_harga_obat" class="tbobat_harga_obat">
<span<?= $Page->harga_obat->viewAttributes() ?>>
<?= $Page->harga_obat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
        <td <?= $Page->stok->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tbobat_stok" class="tbobat_stok">
<span<?= $Page->stok->viewAttributes() ?>>
<?= $Page->stok->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
