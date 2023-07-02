<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbobatEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftbobatedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    ftbobatedit = currentForm = new ew.Form("ftbobatedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tbobat")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.tbobat)
        ew.vars.tables.tbobat = currentTable;
    ftbobatedit.addFields([
        ["id_obat", [fields.id_obat.visible && fields.id_obat.required ? ew.Validators.required(fields.id_obat.caption) : null], fields.id_obat.isInvalid],
        ["nm_obat", [fields.nm_obat.visible && fields.nm_obat.required ? ew.Validators.required(fields.nm_obat.caption) : null], fields.nm_obat.isInvalid],
        ["harga_obat", [fields.harga_obat.visible && fields.harga_obat.required ? ew.Validators.required(fields.harga_obat.caption) : null, ew.Validators.integer], fields.harga_obat.isInvalid],
        ["stok", [fields.stok.visible && fields.stok.required ? ew.Validators.required(fields.stok.caption) : null, ew.Validators.integer], fields.stok.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftbobatedit,
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
    ftbobatedit.validate = function () {
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
    ftbobatedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftbobatedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("ftbobatedit");
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
<form name="ftbobatedit" id="ftbobatedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tbobat">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_obat->Visible) { // id_obat ?>
    <div id="r_id_obat" class="form-group row">
        <label id="elh_tbobat_id_obat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_obat->caption() ?><?= $Page->id_obat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_obat->cellAttributes() ?>>
<span id="el_tbobat_id_obat">
<span<?= $Page->id_obat->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_obat->getDisplayValue($Page->id_obat->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="tbobat" data-field="x_id_obat" data-hidden="1" name="x_id_obat" id="x_id_obat" value="<?= HtmlEncode($Page->id_obat->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->nm_obat->Visible) { // nm_obat ?>
    <div id="r_nm_obat" class="form-group row">
        <label id="elh_tbobat_nm_obat" for="x_nm_obat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->nm_obat->caption() ?><?= $Page->nm_obat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->nm_obat->cellAttributes() ?>>
<span id="el_tbobat_nm_obat">
<input type="<?= $Page->nm_obat->getInputTextType() ?>" data-table="tbobat" data-field="x_nm_obat" name="x_nm_obat" id="x_nm_obat" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->nm_obat->getPlaceHolder()) ?>" value="<?= $Page->nm_obat->EditValue ?>"<?= $Page->nm_obat->editAttributes() ?> aria-describedby="x_nm_obat_help">
<?= $Page->nm_obat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->nm_obat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->harga_obat->Visible) { // harga_obat ?>
    <div id="r_harga_obat" class="form-group row">
        <label id="elh_tbobat_harga_obat" for="x_harga_obat" class="<?= $Page->LeftColumnClass ?>"><?= $Page->harga_obat->caption() ?><?= $Page->harga_obat->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->harga_obat->cellAttributes() ?>>
<span id="el_tbobat_harga_obat">
<input type="<?= $Page->harga_obat->getInputTextType() ?>" data-table="tbobat" data-field="x_harga_obat" name="x_harga_obat" id="x_harga_obat" size="30" placeholder="<?= HtmlEncode($Page->harga_obat->getPlaceHolder()) ?>" value="<?= $Page->harga_obat->EditValue ?>"<?= $Page->harga_obat->editAttributes() ?> aria-describedby="x_harga_obat_help">
<?= $Page->harga_obat->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->harga_obat->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->stok->Visible) { // stok ?>
    <div id="r_stok" class="form-group row">
        <label id="elh_tbobat_stok" for="x_stok" class="<?= $Page->LeftColumnClass ?>"><?= $Page->stok->caption() ?><?= $Page->stok->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->stok->cellAttributes() ?>>
<span id="el_tbobat_stok">
<input type="<?= $Page->stok->getInputTextType() ?>" data-table="tbobat" data-field="x_stok" name="x_stok" id="x_stok" size="30" placeholder="<?= HtmlEncode($Page->stok->getPlaceHolder()) ?>" value="<?= $Page->stok->EditValue ?>"<?= $Page->stok->editAttributes() ?> aria-describedby="x_stok_help">
<?= $Page->stok->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->stok->getErrorMessage() ?></div>
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
    ew.addEventHandlers("tbobat");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
