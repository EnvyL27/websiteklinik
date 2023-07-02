<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPasienDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_pasiendelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    ftb_pasiendelete = currentForm = new ew.Form("ftb_pasiendelete", "delete");
    loadjs.done("ftb_pasiendelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.tb_pasien) ew.vars.tables.tb_pasien = <?= JsonEncode(GetClientVar("tables", "tb_pasien")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftb_pasiendelete" id="ftb_pasiendelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_pasien">
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
<?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
        <th class="<?= $Page->nm_pasien->headerCellClass() ?>"><span id="elh_tb_pasien_nm_pasien" class="tb_pasien_nm_pasien"><?= $Page->nm_pasien->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
        <th class="<?= $Page->tgl_lahir->headerCellClass() ?>"><span id="elh_tb_pasien_tgl_lahir" class="tb_pasien_tgl_lahir"><?= $Page->tgl_lahir->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
        <th class="<?= $Page->alamat->headerCellClass() ?>"><span id="elh_tb_pasien_alamat" class="tb_pasien_alamat"><?= $Page->alamat->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pekerjaan->Visible) { // pekerjaan ?>
        <th class="<?= $Page->pekerjaan->headerCellClass() ?>"><span id="elh_tb_pasien_pekerjaan" class="tb_pasien_pekerjaan"><?= $Page->pekerjaan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
        <th class="<?= $Page->alergi->headerCellClass() ?>"><span id="elh_tb_pasien_alergi" class="tb_pasien_alergi"><?= $Page->alergi->caption() ?></span></th>
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
<?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
        <td <?= $Page->nm_pasien->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_nm_pasien" class="tb_pasien_nm_pasien">
<span<?= $Page->nm_pasien->viewAttributes() ?>>
<?= $Page->nm_pasien->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
        <td <?= $Page->tgl_lahir->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_tgl_lahir" class="tb_pasien_tgl_lahir">
<span<?= $Page->tgl_lahir->viewAttributes() ?>>
<?= $Page->tgl_lahir->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
        <td <?= $Page->alamat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_alamat" class="tb_pasien_alamat">
<span<?= $Page->alamat->viewAttributes() ?>>
<?= $Page->alamat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pekerjaan->Visible) { // pekerjaan ?>
        <td <?= $Page->pekerjaan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_pekerjaan" class="tb_pasien_pekerjaan">
<span<?= $Page->pekerjaan->viewAttributes() ?>>
<?= $Page->pekerjaan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
        <td <?= $Page->alergi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_alergi" class="tb_pasien_alergi">
<span<?= $Page->alergi->viewAttributes() ?>>
<?= $Page->alergi->getViewValue() ?></span>
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
