<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPasienEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_pasienedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    ftb_pasienedit = currentForm = new ew.Form("ftb_pasienedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tb_pasien")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.tb_pasien)
        ew.vars.tables.tb_pasien = currentTable;
    ftb_pasienedit.addFields([
        ["id_pasien", [fields.id_pasien.visible && fields.id_pasien.required ? ew.Validators.required(fields.id_pasien.caption) : null], fields.id_pasien.isInvalid],
        ["nm_pasien", [fields.nm_pasien.visible && fields.nm_pasien.required ? ew.Validators.required(fields.nm_pasien.caption) : null], fields.nm_pasien.isInvalid],
        ["tgl_lahir", [fields.tgl_lahir.visible && fields.tgl_lahir.required ? ew.Validators.required(fields.tgl_lahir.caption) : null, ew.Validators.datetime(0)], fields.tgl_lahir.isInvalid],
        ["alamat", [fields.alamat.visible && fields.alamat.required ? ew.Validators.required(fields.alamat.caption) : null], fields.alamat.isInvalid],
        ["pekerjaan", [fields.pekerjaan.visible && fields.pekerjaan.required ? ew.Validators.required(fields.pekerjaan.caption) : null], fields.pekerjaan.isInvalid],
        ["alergi", [fields.alergi.visible && fields.alergi.required ? ew.Validators.required(fields.alergi.caption) : null], fields.alergi.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftb_pasienedit,
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
    ftb_pasienedit.validate = function () {
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
    ftb_pasienedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftb_pasienedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("ftb_pasienedit");
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
<form name="ftb_pasienedit" id="ftb_pasienedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_pasien">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <div id="r_id_pasien" class="form-group row">
        <label id="elh_tb_pasien_id_pasien" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pasien->caption() ?><?= $Page->id_pasien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_tb_pasien_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_pasien->getDisplayValue($Page->id_pasien->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="tb_pasien" data-field="x_id_pasien" data-hidden="1" name="x_id_pasien" id="x_id_pasien" value="<?= HtmlEncode($Page->id_pasien->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
    <div id="r_nm_pasien" class="form-group row">
        <label id="elh_tb_pasien_nm_pasien" for="x_nm_pasien" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nm_pasien->caption() ?><?= $Page->nm_pasien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nm_pasien->cellAttributes() ?>>
<span id="el_tb_pasien_nm_pasien">
<input type="<?= $Page->nm_pasien->getInputTextType() ?>" data-table="tb_pasien" data-field="x_nm_pasien" name="x_nm_pasien" id="x_nm_pasien" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->nm_pasien->getPlaceHolder()) ?>" value="<?= $Page->nm_pasien->EditValue ?>"<?= $Page->nm_pasien->editAttributes() ?> aria-describedby="x_nm_pasien_help">
<?= $Page->nm_pasien->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nm_pasien->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
    <div id="r_tgl_lahir" class="form-group row">
        <label id="elh_tb_pasien_tgl_lahir" for="x_tgl_lahir" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tgl_lahir->caption() ?><?= $Page->tgl_lahir->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tgl_lahir->cellAttributes() ?>>
<span id="el_tb_pasien_tgl_lahir">
<input type="<?= $Page->tgl_lahir->getInputTextType() ?>" data-table="tb_pasien" data-field="x_tgl_lahir" name="x_tgl_lahir" id="x_tgl_lahir" placeholder="<?= HtmlEncode($Page->tgl_lahir->getPlaceHolder()) ?>" value="<?= $Page->tgl_lahir->EditValue ?>"<?= $Page->tgl_lahir->editAttributes() ?> aria-describedby="x_tgl_lahir_help">
<?= $Page->tgl_lahir->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tgl_lahir->getErrorMessage() ?></div>
<?php if (!$Page->tgl_lahir->ReadOnly && !$Page->tgl_lahir->Disabled && !isset($Page->tgl_lahir->EditAttrs["readonly"]) && !isset($Page->tgl_lahir->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftb_pasienedit", "datetimepicker"], function() {
    ew.createDateTimePicker("ftb_pasienedit", "x_tgl_lahir", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
    <div id="r_alamat" class="form-group row">
        <label id="elh_tb_pasien_alamat" for="x_alamat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alamat->caption() ?><?= $Page->alamat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->alamat->cellAttributes() ?>>
<span id="el_tb_pasien_alamat">
<input type="<?= $Page->alamat->getInputTextType() ?>" data-table="tb_pasien" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->alamat->getPlaceHolder()) ?>" value="<?= $Page->alamat->EditValue ?>"<?= $Page->alamat->editAttributes() ?> aria-describedby="x_alamat_help">
<?= $Page->alamat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alamat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pekerjaan->Visible) { // pekerjaan ?>
    <div id="r_pekerjaan" class="form-group row">
        <label id="elh_tb_pasien_pekerjaan" for="x_pekerjaan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pekerjaan->caption() ?><?= $Page->pekerjaan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pekerjaan->cellAttributes() ?>>
<span id="el_tb_pasien_pekerjaan">
<textarea data-table="tb_pasien" data-field="x_pekerjaan" name="x_pekerjaan" id="x_pekerjaan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->pekerjaan->getPlaceHolder()) ?>"<?= $Page->pekerjaan->editAttributes() ?> aria-describedby="x_pekerjaan_help"><?= $Page->pekerjaan->EditValue ?></textarea>
<?= $Page->pekerjaan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pekerjaan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
    <div id="r_alergi" class="form-group row">
        <label id="elh_tb_pasien_alergi" for="x_alergi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->alergi->caption() ?><?= $Page->alergi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->alergi->cellAttributes() ?>>
<span id="el_tb_pasien_alergi">
<textarea data-table="tb_pasien" data-field="x_alergi" name="x_alergi" id="x_alergi" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->alergi->getPlaceHolder()) ?>"<?= $Page->alergi->editAttributes() ?> aria-describedby="x_alergi_help"><?= $Page->alergi->EditValue ?></textarea>
<?= $Page->alergi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->alergi->getErrorMessage() ?></div>
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
    ew.addEventHandlers("tb_pasien");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
