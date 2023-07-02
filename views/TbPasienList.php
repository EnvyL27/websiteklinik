<?php

namespace PHPMaker2021\webklinik;

// Page object
$TbPasienList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var ftb_pasienlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    ftb_pasienlist = currentForm = new ew.Form("ftb_pasienlist", "list");
    ftb_pasienlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("ftb_pasienlist");
});
var ftb_pasienlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    ftb_pasienlistsrch = currentSearchForm = new ew.Form("ftb_pasienlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "tb_pasien")) ?>,
        fields = currentTable.fields;
    ftb_pasienlistsrch.addFields([
        ["nm_pasien", [], fields.nm_pasien.isInvalid],
        ["tgl_lahir", [ew.Validators.datetime(0)], fields.tgl_lahir.isInvalid],
        ["alamat", [], fields.alamat.isInvalid],
        ["pekerjaan", [], fields.pekerjaan.isInvalid],
        ["alergi", [], fields.alergi.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        ftb_pasienlistsrch.setInvalid();
    });

    // Validate form
    ftb_pasienlistsrch.validate = function () {
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
    ftb_pasienlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    ftb_pasienlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    ftb_pasienlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("ftb_pasienlistsrch");
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
<form name="ftb_pasienlistsrch" id="ftb_pasienlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="ftb_pasienlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="tb_pasien">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_nm_pasien" class="ew-cell form-group">
        <label for="x_nm_pasien" class="ew-search-caption ew-label"><?= $Page->nm_pasien->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_nm_pasien" id="z_nm_pasien" value="LIKE">
</span>
        <span id="el_tb_pasien_nm_pasien" class="ew-search-field">
<input type="<?= $Page->nm_pasien->getInputTextType() ?>" data-table="tb_pasien" data-field="x_nm_pasien" name="x_nm_pasien" id="x_nm_pasien" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->nm_pasien->getPlaceHolder()) ?>" value="<?= $Page->nm_pasien->EditValue ?>"<?= $Page->nm_pasien->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->nm_pasien->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_tgl_lahir" class="ew-cell form-group">
        <label for="x_tgl_lahir" class="ew-search-caption ew-label"><?= $Page->tgl_lahir->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_tgl_lahir" id="z_tgl_lahir" value="=">
</span>
        <span id="el_tb_pasien_tgl_lahir" class="ew-search-field">
<input type="<?= $Page->tgl_lahir->getInputTextType() ?>" data-table="tb_pasien" data-field="x_tgl_lahir" name="x_tgl_lahir" id="x_tgl_lahir" placeholder="<?= HtmlEncode($Page->tgl_lahir->getPlaceHolder()) ?>" value="<?= $Page->tgl_lahir->EditValue ?>"<?= $Page->tgl_lahir->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->tgl_lahir->getErrorMessage(false) ?></div>
<?php if (!$Page->tgl_lahir->ReadOnly && !$Page->tgl_lahir->Disabled && !isset($Page->tgl_lahir->EditAttrs["readonly"]) && !isset($Page->tgl_lahir->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ftb_pasienlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("ftb_pasienlistsrch", "x_tgl_lahir", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_alamat" class="ew-cell form-group">
        <label for="x_alamat" class="ew-search-caption ew-label"><?= $Page->alamat->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_alamat" id="z_alamat" value="LIKE">
</span>
        <span id="el_tb_pasien_alamat" class="ew-search-field">
<input type="<?= $Page->alamat->getInputTextType() ?>" data-table="tb_pasien" data-field="x_alamat" name="x_alamat" id="x_alamat" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->alamat->getPlaceHolder()) ?>" value="<?= $Page->alamat->EditValue ?>"<?= $Page->alamat->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->alamat->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> tb_pasien">
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
<form name="ftb_pasienlist" id="ftb_pasienlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="tb_pasien">
<div id="gmp_tb_pasien" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_tb_pasienlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
        <th data-name="nm_pasien" class="<?= $Page->nm_pasien->headerCellClass() ?>"><div id="elh_tb_pasien_nm_pasien" class="tb_pasien_nm_pasien"><?= $Page->renderSort($Page->nm_pasien) ?></div></th>
<?php } ?>
<?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
        <th data-name="tgl_lahir" class="<?= $Page->tgl_lahir->headerCellClass() ?>"><div id="elh_tb_pasien_tgl_lahir" class="tb_pasien_tgl_lahir"><?= $Page->renderSort($Page->tgl_lahir) ?></div></th>
<?php } ?>
<?php if ($Page->alamat->Visible) { // alamat ?>
        <th data-name="alamat" class="<?= $Page->alamat->headerCellClass() ?>"><div id="elh_tb_pasien_alamat" class="tb_pasien_alamat"><?= $Page->renderSort($Page->alamat) ?></div></th>
<?php } ?>
<?php if ($Page->pekerjaan->Visible) { // pekerjaan ?>
        <th data-name="pekerjaan" class="<?= $Page->pekerjaan->headerCellClass() ?>"><div id="elh_tb_pasien_pekerjaan" class="tb_pasien_pekerjaan"><?= $Page->renderSort($Page->pekerjaan) ?></div></th>
<?php } ?>
<?php if ($Page->alergi->Visible) { // alergi ?>
        <th data-name="alergi" class="<?= $Page->alergi->headerCellClass() ?>"><div id="elh_tb_pasien_alergi" class="tb_pasien_alergi"><?= $Page->renderSort($Page->alergi) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_tb_pasien", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->nm_pasien->Visible) { // nm_pasien ?>
        <td data-name="nm_pasien" <?= $Page->nm_pasien->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_nm_pasien">
<span<?= $Page->nm_pasien->viewAttributes() ?>>
<?= $Page->nm_pasien->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->tgl_lahir->Visible) { // tgl_lahir ?>
        <td data-name="tgl_lahir" <?= $Page->tgl_lahir->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_tgl_lahir">
<span<?= $Page->tgl_lahir->viewAttributes() ?>>
<?= $Page->tgl_lahir->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->alamat->Visible) { // alamat ?>
        <td data-name="alamat" <?= $Page->alamat->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_alamat">
<span<?= $Page->alamat->viewAttributes() ?>>
<?= $Page->alamat->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->pekerjaan->Visible) { // pekerjaan ?>
        <td data-name="pekerjaan" <?= $Page->pekerjaan->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_pekerjaan">
<span<?= $Page->pekerjaan->viewAttributes() ?>>
<?= $Page->pekerjaan->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->alergi->Visible) { // alergi ?>
        <td data-name="alergi" <?= $Page->alergi->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_tb_pasien_alergi">
<span<?= $Page->alergi->viewAttributes() ?>>
<?= $Page->alergi->getViewValue() ?></span>
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
    ew.addEventHandlers("tb_pasien");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
