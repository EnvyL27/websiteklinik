<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPeriksaList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftb_periksalist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    ftb_periksalist = currentForm = new ew.Form("ftb_periksalist", "list");
    ftb_periksalist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("ftb_periksalist");
});
var ftb_periksalistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    ftb_periksalistsrch = currentSearchForm = new ew.Form("ftb_periksalistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tb_periksa")) ?>,
        fields = currentTable.fields;
    ftb_periksalistsrch.addFields([
        ["id_pasien", [], fields.id_pasien.isInvalid],
        ["tanggal", [ew.Validators.datetime(0)], fields.tanggal.isInvalid],
        ["keluhan", [], fields.keluhan.isInvalid],
        ["diagnosa", [], fields.diagnosa.isInvalid],
        ["terapi", [], fields.terapi.isInvalid],
        ["hasilPeriksa", [], fields.hasilPeriksa.isInvalid],
        ["tarif", [], fields.tarif.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        ftb_periksalistsrch.setInvalid();
    });

    // Validate form
    ftb_periksalistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    ftb_periksalistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftb_periksalistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    ftb_periksalistsrch.lists.id_pasien = <?= $Page->id_pasien->toClientList($Page) ?>;

    // Filters
    ftb_periksalistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("ftb_periksalistsrch");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="ftb_periksalistsrch" id="ftb_periksalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="ftb_periksalistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_periksa">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_id_pasien" class="ew-cell form-group">
        <label for="x_id_pasien" class="ew-search-caption ew-label"><?= $Page->id_pasien->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id_pasien" id="z_id_pasien" value="=">
</span>
        <span id="el_tb_periksa_id_pasien" class="ew-search-field">
    <select
        id="x_id_pasien"
        name="x_id_pasien"
        class="form-control ew-select<?= $Page->id_pasien->isInvalidClass() ?>"
        data-select2-id="tb_periksa_x_id_pasien"
        data-table="tb_periksa"
        data-field="x_id_pasien"
        data-value-separator="<?= $Page->id_pasien->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->id_pasien->getPlaceHolder()) ?>"
        <?= $Page->id_pasien->editAttributes() ?>>
        <?= $Page->id_pasien->selectOptionListHtml("x_id_pasien") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->id_pasien->getErrorMessage(false) ?></div>
<?= $Page->id_pasien->Lookup->getParamTag($Page, "p_x_id_pasien") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='tb_periksa_x_id_pasien']"),
        options = { name: "x_id_pasien", selectId: "tb_periksa_x_id_pasien", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.tb_periksa.fields.id_pasien.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_tanggal" class="ew-cell form-group">
        <label for="x_tanggal" class="ew-search-caption ew-label"><?= $Page->tanggal->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_tanggal" id="z_tanggal" value="=">
</span>
        <span id="el_tb_periksa_tanggal" class="ew-search-field">
<input type="<?= $Page->tanggal->getInputTextType() ?>" data-table="tb_periksa" data-field="x_tanggal" name="x_tanggal" id="x_tanggal" placeholder="<?= HtmlEncode($Page->tanggal->getPlaceHolder()) ?>" value="<?= $Page->tanggal->EditValue ?>"<?= $Page->tanggal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->tanggal->getErrorMessage(false) ?></div>
<?php if (!$Page->tanggal->ReadOnly && !$Page->tanggal->Disabled && !isset($Page->tanggal->EditAttrs["readonly"]) && !isset($Page->tanggal->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftb_periksalistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("ftb_periksalistsrch", "x_tanggal", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_periksa">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="ftb_periksalist" id="ftb_periksalist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_periksa">
<div id="gmp_tb_periksa" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_tb_periksalist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <th data-name="id_pasien" class="<?= $Page->id_pasien->headerCellClass() ?>"><div id="elh_tb_periksa_id_pasien" class="tb_periksa_id_pasien"><?= $Page->renderSort($Page->id_pasien) ?></div></th>
<?php } ?>
<?php if ($Page->tanggal->Visible) { // tanggal ?>
        <th data-name="tanggal" class="<?= $Page->tanggal->headerCellClass() ?>"><div id="elh_tb_periksa_tanggal" class="tb_periksa_tanggal"><?= $Page->renderSort($Page->tanggal) ?></div></th>
<?php } ?>
<?php if ($Page->keluhan->Visible) { // keluhan ?>
        <th data-name="keluhan" class="<?= $Page->keluhan->headerCellClass() ?>"><div id="elh_tb_periksa_keluhan" class="tb_periksa_keluhan"><?= $Page->renderSort($Page->keluhan) ?></div></th>
<?php } ?>
<?php if ($Page->diagnosa->Visible) { // diagnosa ?>
        <th data-name="diagnosa" class="<?= $Page->diagnosa->headerCellClass() ?>"><div id="elh_tb_periksa_diagnosa" class="tb_periksa_diagnosa"><?= $Page->renderSort($Page->diagnosa) ?></div></th>
<?php } ?>
<?php if ($Page->terapi->Visible) { // terapi ?>
        <th data-name="terapi" class="<?= $Page->terapi->headerCellClass() ?>"><div id="elh_tb_periksa_terapi" class="tb_periksa_terapi"><?= $Page->renderSort($Page->terapi) ?></div></th>
<?php } ?>
<?php if ($Page->hasilPeriksa->Visible) { // hasilPeriksa ?>
        <th data-name="hasilPeriksa" class="<?= $Page->hasilPeriksa->headerCellClass() ?>"><div id="elh_tb_periksa_hasilPeriksa" class="tb_periksa_hasilPeriksa"><?= $Page->renderSort($Page->hasilPeriksa) ?></div></th>
<?php } ?>
<?php if ($Page->tarif->Visible) { // tarif ?>
        <th data-name="tarif" class="<?= $Page->tarif->headerCellClass() ?>"><div id="elh_tb_periksa_tarif" class="tb_periksa_tarif"><?= $Page->renderSort($Page->tarif) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_tb_periksa", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id_pasien->Visible) { // id_pasien ?>
        <td data-name="id_pasien" <?= $Page->id_pasien->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_id_pasien">
<span<?= $Page->id_pasien->viewAttributes() ?>>
<?= $Page->id_pasien->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tanggal->Visible) { // tanggal ?>
        <td data-name="tanggal" <?= $Page->tanggal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_tanggal">
<span<?= $Page->tanggal->viewAttributes() ?>>
<?= $Page->tanggal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->keluhan->Visible) { // keluhan ?>
        <td data-name="keluhan" <?= $Page->keluhan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_keluhan">
<span<?= $Page->keluhan->viewAttributes() ?>>
<?= $Page->keluhan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->diagnosa->Visible) { // diagnosa ?>
        <td data-name="diagnosa" <?= $Page->diagnosa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_diagnosa">
<span<?= $Page->diagnosa->viewAttributes() ?>>
<?= $Page->diagnosa->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->terapi->Visible) { // terapi ?>
        <td data-name="terapi" <?= $Page->terapi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_terapi">
<span<?= $Page->terapi->viewAttributes() ?>>
<?= $Page->terapi->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->hasilPeriksa->Visible) { // hasilPeriksa ?>
        <td data-name="hasilPeriksa" <?= $Page->hasilPeriksa->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_hasilPeriksa">
<span<?= $Page->hasilPeriksa->viewAttributes() ?>>
<?= $Page->hasilPeriksa->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tarif->Visible) { // tarif ?>
        <td data-name="tarif" <?= $Page->tarif->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_periksa_tarif">
<span<?= $Page->tarif->viewAttributes() ?>>
<?= $Page->tarif->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
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
<?php } ?>
