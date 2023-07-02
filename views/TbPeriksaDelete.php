<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPeriksaDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_periksadelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    ftb_periksadelete = currentForm = new ew.Form("ftb_periksadelete", "delete");
    loadjs.done("ftb_periksadelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.tb_periksa) ew.vars.tables.tb_periksa = <?= JsonEncode(GetClientVar("tables", "tb_periksa")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftb_periksadelete" id="ftb_periksadelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_periksa">
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
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <th class="<?= $Page->id_pasien->headerCellClass() ?>"><span id="elh_tb_periksa_id_pasien" class="tb_periksa_id_pasien"><?= $Page->id_pasien->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <th class="<?= $Page->tanggal->headerCellClass() ?>"><span id="elh_tb_periksa_tanggal" class="tb_periksa_tanggal"><?= $Page->tanggal->caption() ?></span></th>
<?php } ?>
<?php if ($Page->keluhan->Visible) { // keluhan ?>
        <th class="<?= $Page->keluhan->headerCellClass() ?>"><span id="elh_tb_periksa_keluhan" class="tb_periksa_keluhan"><?= $Page->keluhan->caption() ?></span></th>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
        <th class="<?= $Page->diagnosa->headerCellClass() ?>"><span id="elh_tb_periksa_diagnosa" class="tb_periksa_diagnosa"><?= $Page->diagnosa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->terapi->Visible) { // terapi ?>
        <th class="<?= $Page->terapi->headerCellClass() ?>"><span id="elh_tb_periksa_terapi" class="tb_periksa_terapi"><?= $Page->terapi->caption() ?></span></th>
<?php } ?>
<?php if ($Page->hasilPeriksa->Visible) { // hasilPeriksa ?>
        <th class="<?= $Page->hasilPeriksa->headerCellClass() ?>"><span id="elh_tb_periksa_hasilPeriksa" class="tb_periksa_hasilPeriksa"><?= $Page->hasilPeriksa->caption() ?></span></th>
<?php } ?>
<?php if ($Page->tarif->Visible) { // tarif ?>
        <th class="<?= $Page->tarif->headerCellClass() ?>"><span id="elh_tb_periksa_tarif" class="tb_periksa_tarif"><?= $Page->tarif->caption() ?></span></th>
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
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <td <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_id_pasien" class="tb_periksa_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <td <?= $Page->tanggal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_tanggal" class="tb_periksa_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->keluhan->Visible) { // keluhan ?>
        <td <?= $Page->keluhan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_keluhan" class="tb_periksa_keluhan">
<span<?= $Page->keluhan->viewAttributes() ?>>
<?= $Page->keluhan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
        <td <?= $Page->diagnosa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_diagnosa" class="tb_periksa_diagnosa">
<span<?= $Page->diagnosa->viewAttributes() ?>>
<?= $Page->diagnosa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->terapi->Visible) { // terapi ?>
        <td <?= $Page->terapi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_terapi" class="tb_periksa_terapi">
<span<?= $Page->terapi->viewAttributes() ?>>
<?= $Page->terapi->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->hasilPeriksa->Visible) { // hasilPeriksa ?>
        <td <?= $Page->hasilPeriksa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_hasilPeriksa" class="tb_periksa_hasilPeriksa">
<span<?= $Page->hasilPeriksa->viewAttributes() ?>>
<?= $Page->hasilPeriksa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->tarif->Visible) { // tarif ?>
        <td <?= $Page->tarif->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_tarif" class="tb_periksa_tarif">
<span<?= $Page->tarif->viewAttributes() ?>>
<?= $Page->tarif->getViewValue() ?></span>
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
