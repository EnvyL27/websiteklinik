<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPeriksaEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var ftb_periksaedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    ftb_periksaedit = currentForm = new ew.Form("ftb_periksaedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tb_periksa")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.tb_periksa)
        ew.vars.tables.tb_periksa = currentTable;
    ftb_periksaedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["id_pasien", [fields.id_pasien.visible && fields.id_pasien.required ? ew.Validators.required(fields.id_pasien.caption) : null], fields.id_pasien.isInvalid],
        ["tanggal", [fields.tanggal.visible && fields.tanggal.required ? ew.Validators.required(fields.tanggal.caption) : null], fields.tanggal.isInvalid],
        ["keluhan", [fields.keluhan.visible && fields.keluhan.required ? ew.Validators.required(fields.keluhan.caption) : null], fields.keluhan.isInvalid],
        ["diagnosa", [fields.diagnosa.visible && fields.diagnosa.required ? ew.Validators.required(fields.diagnosa.caption) : null], fields.diagnosa.isInvalid],
        ["terapi", [fields.terapi.visible && fields.terapi.required ? ew.Validators.required(fields.terapi.caption) : null], fields.terapi.isInvalid],
        ["hasilPeriksa", [fields.hasilPeriksa.visible && fields.hasilPeriksa.required ? ew.Validators.required(fields.hasilPeriksa.caption) : null], fields.hasilPeriksa.isInvalid],
        ["tarif", [fields.tarif.visible && fields.tarif.required ? ew.Validators.required(fields.tarif.caption) : null, ew.Validators.integer], fields.tarif.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = ftb_periksaedit,
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
    ftb_periksaedit.validate = function () {
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
    ftb_periksaedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftb_periksaedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("ftb_periksaedit");
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
<form name="ftb_periksaedit" id="ftb_periksaedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_periksa">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_tb_periksa_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_tb_periksa_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="tb_periksa" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <div id="r_id_pasien" class="form-group row">
        <label id="elh_tb_periksa_id_pasien" for="x_id_pasien" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_pasien->caption() ?><?= $Page->id_pasien->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el_tb_periksa_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_pasien->getDisplayValue($Page->id_pasien->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="tb_periksa" data-field="x_id_pasien" data-hidden="1" name="x_id_pasien" id="x_id_pasien" value="<?= HtmlEncode($Page->id_pasien->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <div id="r_tanggal" class="form-group row">
        <label id="elh_tb_periksa_tanggal" for="x_tanggal" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tanggal->caption() ?><?= $Page->tanggal->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tanggal->cellAttributes() ?>>
<span id="el_tb_periksa_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->tanggal->getDisplayValue($Page->tanggal->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="tb_periksa" data-field="x_tanggal" data-hidden="1" name="x_tanggal" id="x_tanggal" value="<?= HtmlEncode($Page->tanggal->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->keluhan->Visible) { // keluhan ?>
    <div id="r_keluhan" class="form-group row">
        <label id="elh_tb_periksa_keluhan" for="x_keluhan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->keluhan->caption() ?><?= $Page->keluhan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->keluhan->cellAttributes() ?>>
<span id="el_tb_periksa_keluhan">
<textarea data-table="tb_periksa" data-field="x_keluhan" name="x_keluhan" id="x_keluhan" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->keluhan->getPlaceHolder()) ?>"<?= $Page->keluhan->editAttributes() ?> aria-describedby="x_keluhan_help"><?= $Page->keluhan->EditValue ?></textarea>
<?= $Page->keluhan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->keluhan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
    <div id="r_diagnosa" class="form-group row">
        <label id="elh_tb_periksa_diagnosa" for="x_diagnosa" class="<?= $Page->LeftColumnClass ?>"><?= $Page->diagnosa->caption() ?><?= $Page->diagnosa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->diagnosa->cellAttributes() ?>>
<span id="el_tb_periksa_diagnosa">
<textarea data-table="tb_periksa" data-field="x_diagnosa" name="x_diagnosa" id="x_diagnosa" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->diagnosa->getPlaceHolder()) ?>"<?= $Page->diagnosa->editAttributes() ?> aria-describedby="x_diagnosa_help"><?= $Page->diagnosa->EditValue ?></textarea>
<?= $Page->diagnosa->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->diagnosa->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->terapi->Visible) { // terapi ?>
    <div id="r_terapi" class="form-group row">
        <label id="elh_tb_periksa_terapi" for="x_terapi" class="<?= $Page->LeftColumnClass ?>"><?= $Page->terapi->caption() ?><?= $Page->terapi->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->terapi->cellAttributes() ?>>
<span id="el_tb_periksa_terapi">
<textarea data-table="tb_periksa" data-field="x_terapi" name="x_terapi" id="x_terapi" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->terapi->getPlaceHolder()) ?>"<?= $Page->terapi->editAttributes() ?> aria-describedby="x_terapi_help"><?= $Page->terapi->EditValue ?></textarea>
<?= $Page->terapi->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->terapi->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->hasilPeriksa->Visible) { // hasilPeriksa ?>
    <div id="r_hasilPeriksa" class="form-group row">
        <label id="elh_tb_periksa_hasilPeriksa" for="x_hasilPeriksa" class="<?= $Page->LeftColumnClass ?>"><?= $Page->hasilPeriksa->caption() ?><?= $Page->hasilPeriksa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->hasilPeriksa->cellAttributes() ?>>
<span id="el_tb_periksa_hasilPeriksa">
<textarea data-table="tb_periksa" data-field="x_hasilPeriksa" name="x_hasilPeriksa" id="x_hasilPeriksa" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->hasilPeriksa->getPlaceHolder()) ?>"<?= $Page->hasilPeriksa->editAttributes() ?> aria-describedby="x_hasilPeriksa_help"><?= $Page->hasilPeriksa->EditValue ?></textarea>
<?= $Page->hasilPeriksa->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->hasilPeriksa->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->tarif->Visible) { // tarif ?>
    <div id="r_tarif" class="form-group row">
        <label id="elh_tb_periksa_tarif" for="x_tarif" class="<?= $Page->LeftColumnClass ?>"><?= $Page->tarif->caption() ?><?= $Page->tarif->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->tarif->cellAttributes() ?>>
<span id="el_tb_periksa_tarif">
<input type="<?= $Page->tarif->getInputTextType() ?>" data-table="tb_periksa" data-field="x_tarif" name="x_tarif" id="x_tarif" size="30" placeholder="<?= HtmlEncode($Page->tarif->getPlaceHolder()) ?>" value="<?= $Page->tarif->EditValue ?>"<?= $Page->tarif->editAttributes() ?> aria-describedby="x_tarif_help">
<?= $Page->tarif->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->tarif->getErrorMessage() ?></div>
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
    ew.addEventHandlers("tb_periksa");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
