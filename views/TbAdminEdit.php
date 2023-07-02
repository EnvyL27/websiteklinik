<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbAdminEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_adminedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    ftb_adminedit = currentForm = new ew.Form("ftb_adminedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tb_admin")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.tb_admin)
        ew.vars.tables.tb_admin = currentTable;
    ftb_adminedit.addFields([
        ["id_admin", [fields.id_admin.visible && fields.id_admin.required ? ew.Validators.required(fields.id_admin.caption) : null], fields.id_admin.isInvalid],
        ["user", [fields.user.visible && fields.user.required ? ew.Validators.required(fields.user.caption) : null], fields.user.isInvalid],
        ["pass", [fields.pass.visible && fields.pass.required ? ew.Validators.required(fields.pass.caption) : null], fields.pass.isInvalid],
        ["nm_admin", [fields.nm_admin.visible && fields.nm_admin.required ? ew.Validators.required(fields.nm_admin.caption) : null], fields.nm_admin.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftb_adminedit,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    ftb_adminedit.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    ftb_adminedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftb_adminedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("ftb_adminedit");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="ftb_adminedit" id="ftb_adminedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_admin">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_admin->Visible) { // id_admin ?>
    <div id="r_id_admin" class="form-group row">
        <label id="elh_tb_admin_id_admin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_admin->caption() ?><?= $Page->id_admin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_admin->cellAttributes() ?>>
<span id="el_tb_admin_id_admin">
<span<?= $Page->id_admin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_admin->getDisplayValue($Page->id_admin->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="tb_admin" data-field="x_id_admin" data-hidden="1" name="x_id_admin" id="x_id_admin" value="<?= HtmlEncode($Page->id_admin->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->user->Visible) { // user ?>
    <div id="r_user" class="form-group row">
        <label id="elh_tb_admin_user" for="x_user" class="<?= $Page->LeftColumnClass ?>"><?= $Page->user->caption() ?><?= $Page->user->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->user->cellAttributes() ?>>
<span id="el_tb_admin_user">
<input type="<?= $Page->user->getInputTextType() ?>" data-table="tb_admin" data-field="x_user" name="x_user" id="x_user" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->user->getPlaceHolder()) ?>" value="<?= $Page->user->EditValue ?>"<?= $Page->user->editAttributes() ?> aria-describedby="x_user_help">
<?= $Page->user->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->user->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pass->Visible) { // pass ?>
    <div id="r_pass" class="form-group row">
        <label id="elh_tb_admin_pass" for="x_pass" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pass->caption() ?><?= $Page->pass->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pass->cellAttributes() ?>>
<span id="el_tb_admin_pass">
<input type="<?= $Page->pass->getInputTextType() ?>" data-table="tb_admin" data-field="x_pass" name="x_pass" id="x_pass" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->pass->getPlaceHolder()) ?>" value="<?= $Page->pass->EditValue ?>"<?= $Page->pass->editAttributes() ?> aria-describedby="x_pass_help">
<?= $Page->pass->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pass->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nm_admin->Visible) { // nm_admin ?>
    <div id="r_nm_admin" class="form-group row">
        <label id="elh_tb_admin_nm_admin" for="x_nm_admin" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nm_admin->caption() ?><?= $Page->nm_admin->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nm_admin->cellAttributes() ?>>
<span id="el_tb_admin_nm_admin">
<input type="<?= $Page->nm_admin->getInputTextType() ?>" data-table="tb_admin" data-field="x_nm_admin" name="x_nm_admin" id="x_nm_admin" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->nm_admin->getPlaceHolder()) ?>" value="<?= $Page->nm_admin->EditValue ?>"<?= $Page->nm_admin->editAttributes() ?> aria-describedby="x_nm_admin_help">
<?= $Page->nm_admin->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nm_admin->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("tb_admin");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
