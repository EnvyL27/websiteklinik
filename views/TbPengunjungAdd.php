<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPengunjungAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_pengunjungadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    ftb_pengunjungadd = currentForm = new ew.Form("ftb_pengunjungadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tb_pengunjung")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.tb_pengunjung)
        ew.vars.tables.tb_pengunjung = currentTable;
    ftb_pengunjungadd.addFields([
        ["id_pasien", [fields.id_pasien.visible && fields.id_pasien.required ? ew.Validators.required(fields.id_pasien.caption) : null], fields.id_pasien.isInvalid],
        ["tanggal", [fields.tanggal.visible && fields.tanggal.required ? ew.Validators.required(fields.tanggal.caption) : null, ew.Validators.datetime(0)], fields.tanggal.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftb_pengunjungadd,
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
    ftb_pengunjungadd.validate = function () {
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
    ftb_pengunjungadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftb_pengunjungadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    ftb_pengunjungadd.lists.id_pasien = <?= $Page->id_pasien->toClientList($Page) ?>;
    loadjs.done("ftb_pengunjungadd");
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
<form name="ftb_pengunjungadd" id="ftb_pengunjungadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_pengunjung">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <div id="r_id_pasien" class="form-group row">
        <label id="elh_tb_pengunjung_id_pasien" for="x_id_pasien" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pasien->caption() ?><?= $Page->id_pasien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_tb_pengunjung_id_pasien">
    <select
        id="x_id_pasien"
        name="x_id_pasien"
        class="form-control ew-select<?= $Page->id_pasien->isInvalidClass() ?>"
        data-select2-id="tb_pengunjung_x_id_pasien"
        data-table="tb_pengunjung"
        data-field="x_id_pasien"
        data-value-separator="<?= $Page->id_pasien->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_pasien->getPlaceHolder()) ?>"
        <?= $Page->id_pasien->editAttributes() ?>>
        <?= $Page->id_pasien->selectOptionListHtml("x_id_pasien") ?>
    </select>
    <?= $Page->id_pasien->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->id_pasien->getErrorMessage() ?></div>
<?= $Page->id_pasien->Lookup->getParamTag($Page, "p_x_id_pasien") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='tb_pengunjung_x_id_pasien']"),
        options = { name: "x_id_pasien", selectId: "tb_pengunjung_x_id_pasien", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.tb_pengunjung.fields.id_pasien.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <div id="r_tanggal" class="form-group row">
        <label id="elh_tb_pengunjung_tanggal" for="x_tanggal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal->caption() ?><?= $Page->tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tanggal->cellAttributes() ?>>
<span id="el_tb_pengunjung_tanggal">
<input type="<?= $Page->tanggal->getInputTextType() ?>" data-table="tb_pengunjung" data-field="x_tanggal" name="x_tanggal" id="x_tanggal" placeholder="<?= HtmlEncode($Page->tanggal->getPlaceHolder()) ?>" value="<?= $Page->tanggal->EditValue ?>"<?= $Page->tanggal->editAttributes() ?> aria-describedby="x_tanggal_help">
<?= $Page->tanggal->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tanggal->getErrorMessage() ?></div>
<?php if (!$Page->tanggal->ReadOnly && !$Page->tanggal->Disabled && !isset($Page->tanggal->EditAttrs["readonly"]) && !isset($Page->tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftb_pengunjungadd", "datetimepicker"], function() {
    ew.createDateTimePicker("ftb_pengunjungadd", "x_tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("tb_pengunjung");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
