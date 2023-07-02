<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbAdminView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftb_adminview;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "view";
    ftb_adminview = currentForm = new ew.Form("ftb_adminview", "view");
    loadjs.done("ftb_adminview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<script>
if (!ew.vars.tables.tb_admin) ew.vars.tables.tb_admin = <?= JsonEncode(GetClientVar("tables", "tb_admin")) ?>;
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
<form name="ftb_adminview" id="ftb_adminview" class="form-inline ew-form ew-view-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_admin">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($Page->id_admin->Visible) { // id_admin ?>
    <tr id="r_id_admin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_admin_id_admin"><?= $Page->id_admin->caption() ?></span></td>
        <td data-name="id_admin" <?= $Page->id_admin->cellAttributes() ?>>
<span id="el_tb_admin_id_admin">
<span<?= $Page->id_admin->viewAttributes() ?>>
<?= $Page->id_admin->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->user->Visible) { // user ?>
    <tr id="r_user">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_admin_user"><?= $Page->user->caption() ?></span></td>
        <td data-name="user" <?= $Page->user->cellAttributes() ?>>
<span id="el_tb_admin_user">
<span<?= $Page->user->viewAttributes() ?>>
<?= $Page->user->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->pass->Visible) { // pass ?>
    <tr id="r_pass">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_admin_pass"><?= $Page->pass->caption() ?></span></td>
        <td data-name="pass" <?= $Page->pass->cellAttributes() ?>>
<span id="el_tb_admin_pass">
<span<?= $Page->pass->viewAttributes() ?>>
<?= $Page->pass->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->nm_admin->Visible) { // nm_admin ?>
    <tr id="r_nm_admin">
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_tb_admin_nm_admin"><?= $Page->nm_admin->caption() ?></span></td>
        <td data-name="nm_admin" <?= $Page->nm_admin->cellAttributes() ?>>
<span id="el_tb_admin_nm_admin">
<span<?= $Page->nm_admin->viewAttributes() ?>>
<?= $Page->nm_admin->getViewValue() ?></span>
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
