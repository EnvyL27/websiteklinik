<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbAdminDelete = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_admindelete;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "delete";
    ftb_admindelete = currentForm = new ew.Form("ftb_admindelete", "delete");
    loadjs.done("ftb_admindelete");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<script>
if (!ew.vars.tables.tb_admin) ew.vars.tables.tb_admin = <?= JsonEncode(GetClientVar("tables", "tb_admin")) ?>;
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftb_admindelete" id="ftb_admindelete" class="form-inline ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_admin">
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
<?php if ($Page->id_admin->Visible) { // id_admin ?>
        <th class="<?= $Page->id_admin->headerCellClass() ?>"><span id="elh_tb_admin_id_admin" class="tb_admin_id_admin"><?= $Page->id_admin->caption() ?></span></th>
<?php } ?>
<?php if ($Page->user->Visible) { // user ?>
        <th class="<?= $Page->user->headerCellClass() ?>"><span id="elh_tb_admin_user" class="tb_admin_user"><?= $Page->user->caption() ?></span></th>
<?php } ?>
<?php if ($Page->pass->Visible) { // pass ?>
        <th class="<?= $Page->pass->headerCellClass() ?>"><span id="elh_tb_admin_pass" class="tb_admin_pass"><?= $Page->pass->caption() ?></span></th>
<?php } ?>
<?php if ($Page->nm_admin->Visible) { // nm_admin ?>
        <th class="<?= $Page->nm_admin->headerCellClass() ?>"><span id="elh_tb_admin_nm_admin" class="tb_admin_nm_admin"><?= $Page->nm_admin->caption() ?></span></th>
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
<?php if ($Page->id_admin->Visible) { // id_admin ?>
        <td <?= $Page->id_admin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_admin_id_admin" class="tb_admin_id_admin">
<span<?= $Page->id_admin->viewAttributes() ?>>
<?= $Page->id_admin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->user->Visible) { // user ?>
        <td <?= $Page->user->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_admin_user" class="tb_admin_user">
<span<?= $Page->user->viewAttributes() ?>>
<?= $Page->user->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->pass->Visible) { // pass ?>
        <td <?= $Page->pass->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_admin_pass" class="tb_admin_pass">
<span<?= $Page->pass->viewAttributes() ?>>
<?= $Page->pass->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->nm_admin->Visible) { // nm_admin ?>
        <td <?= $Page->nm_admin->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_admin_nm_admin" class="tb_admin_nm_admin">
<span<?= $Page->nm_admin->viewAttributes() ?>>
<?= $Page->nm_admin->getViewValue() ?></span>
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
