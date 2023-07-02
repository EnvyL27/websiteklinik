<?php

namespace PHPMaker2021\webklinik;

use Doctrine\DBAL\ParameterType;

/**
 * Table class for tb_pasien
 */
class TbPasien extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Export
    public $ExportDoc;

    // Fields
    public $id_pasien;
    public $nm_pasien;
    public $tgl_lahir;
    public $alamat;
    public $pekerjaan;
    public $alergi;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        global $Language, $CurrentLanguage;
        parent::__construct();

        // Language object
        $Language = Container("language");
        $this->TableVar = 'tb_pasien';
        $this->TableName = 'tb_pasien';
        $this->TableType = 'TABLE';

        // Update Table
        $this->UpdateTable = "`tb_pasien`";
        $this->Dbid = 'DB';
        $this->ExportAll = false;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)
        $this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
        $this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this->TableVar);

        // id_pasien
        $this->id_pasien = new DbField('tb_pasien', 'tb_pasien', 'x_id_pasien', 'id_pasien', '`id_pasien`', '`id_pasien`', 3, 11, -1, false, '`id_pasien`', false, false, false, 'FORMATTED TEXT', 'NO');
        $this->id_pasien->IsAutoIncrement = true; // Autoincrement field
        $this->id_pasien->IsPrimaryKey = true; // Primary key field
        $this->id_pasien->Sortable = false; // Allow sort
        $this->id_pasien->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id_pasien->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->id_pasien->Param, "CustomMsg");
        $this->Fields['id_pasien'] = &$this->id_pasien;

        // nm_pasien
        $this->nm_pasien = new DbField('tb_pasien', 'tb_pasien', 'x_nm_pasien', 'nm_pasien', '`nm_pasien`', '`nm_pasien`', 200, 50, -1, false, '`nm_pasien`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->nm_pasien->Nullable = false; // NOT NULL field
        $this->nm_pasien->Required = true; // Required field
        $this->nm_pasien->Sortable = true; // Allow sort
        $this->nm_pasien->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->nm_pasien->Param, "CustomMsg");
        $this->Fields['nm_pasien'] = &$this->nm_pasien;

        // tgl_lahir
        $this->tgl_lahir = new DbField('tb_pasien', 'tb_pasien', 'x_tgl_lahir', 'tgl_lahir', '`tgl_lahir`', CastDateFieldForLike("`tgl_lahir`", 0, "DB"), 133, 10, 0, false, '`tgl_lahir`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->tgl_lahir->Nullable = false; // NOT NULL field
        $this->tgl_lahir->Required = true; // Required field
        $this->tgl_lahir->Sortable = true; // Allow sort
        $this->tgl_lahir->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
        $this->tgl_lahir->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->tgl_lahir->Param, "CustomMsg");
        $this->Fields['tgl_lahir'] = &$this->tgl_lahir;

        // alamat
        $this->alamat = new DbField('tb_pasien', 'tb_pasien', 'x_alamat', 'alamat', '`alamat`', '`alamat`', 200, 255, -1, false, '`alamat`', false, false, false, 'FORMATTED TEXT', 'TEXT');
        $this->alamat->Nullable = false; // NOT NULL field
        $this->alamat->Required = true; // Required field
        $this->alamat->Sortable = true; // Allow sort
        $this->alamat->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->alamat->Param, "CustomMsg");
        $this->Fields['alamat'] = &$this->alamat;

        // pekerjaan
        $this->pekerjaan = new DbField('tb_pasien', 'tb_pasien', 'x_pekerjaan', 'pekerjaan', '`pekerjaan`', '`pekerjaan`', 201, -1, -1, false, '`pekerjaan`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->pekerjaan->Nullable = false; // NOT NULL field
        $this->pekerjaan->Required = true; // Required field
        $this->pekerjaan->Sortable = true; // Allow sort
        $this->pekerjaan->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->pekerjaan->Param, "CustomMsg");
        $this->Fields['pekerjaan'] = &$this->pekerjaan;

        // alergi
        $this->alergi = new DbField('tb_pasien', 'tb_pasien', 'x_alergi', 'alergi', '`alergi`', '`alergi`', 201, 65535, -1, false, '`alergi`', false, false, false, 'FORMATTED TEXT', 'TEXTAREA');
        $this->alergi->Nullable = false; // NOT NULL field
        $this->alergi->Required = true; // Required field
        $this->alergi->Sortable = true; // Allow sort
        $this->alergi->CustomMsg = $Language->FieldPhrase($this->TableVar, $this->alergi->Param, "CustomMsg");
        $this->Fields['alergi'] = &$this->alergi;
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $fld->setSort($curSort);
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        } else {
            $fld->setSort("");
        }
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "`tb_pasien`";
    }

    public function sqlFrom() // For backward compatibility
    {
        return $this->getSqlFrom();
    }

    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
    }

    public function sqlSelect() // For backward compatibility
    {
        return $this->getSqlSelect();
    }

    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    public function sqlWhere() // For backward compatibility
    {
        return $this->getSqlWhere();
    }

    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    public function getSqlGroupBy() // Group By
    {
        return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
    }

    public function sqlGroupBy() // For backward compatibility
    {
        return $this->getSqlGroupBy();
    }

    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    public function sqlHaving() // For backward compatibility
    {
        return $this->getSqlHaving();
    }

    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    public function getSqlOrderBy() // Order By
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : $this->DefaultSort;
    }

    public function sqlOrderBy() // For backward compatibility
    {
        return $this->getSqlOrderBy();
    }

    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter)
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return (($allow & 1) == 1);
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return (($allow & 4) == 4);
            case "delete":
                return (($allow & 2) == 2);
            case "view":
                return (($allow & 32) == 32);
            case "search":
                return (($allow & 64) == 64);
            default:
                return (($allow & 8) == 8);
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof \Doctrine\DBAL\Query\QueryBuilder) { // Query builder
            $sqlwrk = clone $sql;
            $sqlwrk = $sqlwrk->resetQueryPart("orderBy")->getSQL();
        } else {
            $sqlwrk = $sql;
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sqlwrk) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sqlwrk) && !preg_match('/\s+order\s+by\s+/i', $sqlwrk)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $rs = $conn->executeQuery($sqlwrk);
        $cnt = $rs->fetchColumn();
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        )->getSQL();
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    protected function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        $success = $this->insertSql($rs)->execute();
        if ($success) {
            // Get insert id if necessary
            $this->id_pasien->setDbValue($conn->lastInsertId());
            $rs['id_pasien'] = $this->id_pasien->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        $success = $this->updateSql($rs, $where, $curfilter)->execute();
        $success = ($success > 0) ? $success : true;
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    protected function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id_pasien', $rs)) {
                AddFilter($where, QuotedName('id_pasien', $this->Dbid) . '=' . QuotedValue($rs['id_pasien'], $this->id_pasien->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            $success = $this->deleteSql($rs, $where, $curfilter)->execute();
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id_pasien->DbValue = $row['id_pasien'];
        $this->nm_pasien->DbValue = $row['nm_pasien'];
        $this->tgl_lahir->DbValue = $row['tgl_lahir'];
        $this->alamat->DbValue = $row['alamat'];
        $this->pekerjaan->DbValue = $row['pekerjaan'];
        $this->alergi->DbValue = $row['alergi'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "`id_pasien` = @id_pasien@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->id_pasien->CurrentValue : $this->id_pasien->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id_pasien->CurrentValue = $keys[0];
            } else {
                $this->id_pasien->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id_pasien', $row) ? $row['id_pasien'] : null;
        } else {
            $val = $this->id_pasien->OldValue !== null ? $this->id_pasien->OldValue : $this->id_pasien->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id_pasien@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("tbpasienlist");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "tbpasienview") {
            return $Language->phrase("View");
        } elseif ($pageName == "tbpasienedit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "tbpasienadd") {
            return $Language->phrase("Add");
        } else {
            return "";
        }
    }

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "TbPasienView";
            case Config("API_ADD_ACTION"):
                return "TbPasienAdd";
            case Config("API_EDIT_ACTION"):
                return "TbPasienEdit";
            case Config("API_DELETE_ACTION"):
                return "TbPasienDelete";
            case Config("API_LIST_ACTION"):
                return "TbPasienList";
            default:
                return "";
        }
    }

    // List URL
    public function getListUrl()
    {
        return "tbpasienlist";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("tbpasienview", $this->getUrlParm($parm));
        } else {
            $url = $this->keyUrl("tbpasienview", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "tbpasienadd?" . $this->getUrlParm($parm);
        } else {
            $url = "tbpasienadd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("tbpasienedit", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        $url = $this->keyUrl("tbpasienadd", $this->getUrlParm($parm));
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl()
    {
        return $this->keyUrl("tbpasiendelete", $this->getUrlParm());
    }

    // Add master url
    public function addMasterUrl($url)
    {
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "id_pasien:" . JsonEncode($this->id_pasien->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id_pasien->CurrentValue !== null) {
            $url .= "/" . rawurlencode($this->id_pasien->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderSort($fld)
    {
        $classId = $fld->TableVar . "_" . $fld->Param;
        $scriptId = str_replace("%id%", $classId, "tpc_%id%");
        $scriptStart = $this->UseCustomTemplate ? "<template id=\"" . $scriptId . "\">" : "";
        $scriptEnd = $this->UseCustomTemplate ? "</template>" : "";
        $jsSort = " class=\"ew-pointer\" onclick=\"ew.sort(event, '" . $this->sortUrl($fld) . "', 1);\"";
        if ($this->sortUrl($fld) == "") {
            $html = <<<NOSORTHTML
{$scriptStart}<div class="ew-table-header-caption">{$fld->caption()}</div>{$scriptEnd}
NOSORTHTML;
        } else {
            if ($fld->getSort() == "ASC") {
                $sortIcon = '<i class="fas fa-sort-up"></i>';
            } elseif ($fld->getSort() == "DESC") {
                $sortIcon = '<i class="fas fa-sort-down"></i>';
            } else {
                $sortIcon = '';
            }
            $html = <<<SORTHTML
{$scriptStart}<div{$jsSort}><div class="ew-table-header-btn"><span class="ew-table-header-caption">{$fld->caption()}</span><span class="ew-table-header-sort">{$sortIcon}</span></div></div>{$scriptEnd}
SORTHTML;
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort());
            return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("id_pasien") ?? Route("id_pasien")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id_pasien->CurrentValue = $key;
            } else {
                $this->id_pasien->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function &loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        $stmt = $conn->executeQuery($sql);
        return $stmt;
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id_pasien->setDbValue($row['id_pasien']);
        $this->nm_pasien->setDbValue($row['nm_pasien']);
        $this->tgl_lahir->setDbValue($row['tgl_lahir']);
        $this->alamat->setDbValue($row['alamat']);
        $this->pekerjaan->setDbValue($row['pekerjaan']);
        $this->alergi->setDbValue($row['alergi']);
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id_pasien

        // nm_pasien

        // tgl_lahir

        // alamat

        // pekerjaan

        // alergi

        // id_pasien
        $this->id_pasien->ViewValue = $this->id_pasien->CurrentValue;
        $this->id_pasien->ViewCustomAttributes = "";

        // nm_pasien
        $this->nm_pasien->ViewValue = $this->nm_pasien->CurrentValue;
        $this->nm_pasien->ViewCustomAttributes = "";

        // tgl_lahir
        $this->tgl_lahir->ViewValue = $this->tgl_lahir->CurrentValue;
        $this->tgl_lahir->ViewValue = FormatDateTime($this->tgl_lahir->ViewValue, 0);
        $this->tgl_lahir->ViewCustomAttributes = "";

        // alamat
        $this->alamat->ViewValue = $this->alamat->CurrentValue;
        $this->alamat->ViewCustomAttributes = "";

        // pekerjaan
        $this->pekerjaan->ViewValue = $this->pekerjaan->CurrentValue;
        $this->pekerjaan->ViewCustomAttributes = "";

        // alergi
        $this->alergi->ViewValue = $this->alergi->CurrentValue;
        $this->alergi->ViewCustomAttributes = "";

        // id_pasien
        $this->id_pasien->LinkCustomAttributes = "";
        $this->id_pasien->HrefValue = "";
        $this->id_pasien->TooltipValue = "";

        // nm_pasien
        $this->nm_pasien->LinkCustomAttributes = "";
        $this->nm_pasien->HrefValue = "";
        $this->nm_pasien->TooltipValue = "";

        // tgl_lahir
        $this->tgl_lahir->LinkCustomAttributes = "";
        $this->tgl_lahir->HrefValue = "";
        $this->tgl_lahir->TooltipValue = "";

        // alamat
        $this->alamat->LinkCustomAttributes = "";
        $this->alamat->HrefValue = "";
        $this->alamat->TooltipValue = "";

        // pekerjaan
        $this->pekerjaan->LinkCustomAttributes = "";
        $this->pekerjaan->HrefValue = "";
        $this->pekerjaan->TooltipValue = "";

        // alergi
        $this->alergi->LinkCustomAttributes = "";
        $this->alergi->HrefValue = "";
        $this->alergi->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id_pasien
        $this->id_pasien->EditAttrs["class"] = "form-control";
        $this->id_pasien->EditCustomAttributes = "";
        $this->id_pasien->EditValue = $this->id_pasien->CurrentValue;
        $this->id_pasien->ViewCustomAttributes = "";

        // nm_pasien
        $this->nm_pasien->EditAttrs["class"] = "form-control";
        $this->nm_pasien->EditCustomAttributes = "";
        if (!$this->nm_pasien->Raw) {
            $this->nm_pasien->CurrentValue = HtmlDecode($this->nm_pasien->CurrentValue);
        }
        $this->nm_pasien->EditValue = $this->nm_pasien->CurrentValue;
        $this->nm_pasien->PlaceHolder = RemoveHtml($this->nm_pasien->caption());

        // tgl_lahir
        $this->tgl_lahir->EditAttrs["class"] = "form-control";
        $this->tgl_lahir->EditCustomAttributes = "";
        $this->tgl_lahir->EditValue = FormatDateTime($this->tgl_lahir->CurrentValue, 8);
        $this->tgl_lahir->PlaceHolder = RemoveHtml($this->tgl_lahir->caption());

        // alamat
        $this->alamat->EditAttrs["class"] = "form-control";
        $this->alamat->EditCustomAttributes = "";
        if (!$this->alamat->Raw) {
            $this->alamat->CurrentValue = HtmlDecode($this->alamat->CurrentValue);
        }
        $this->alamat->EditValue = $this->alamat->CurrentValue;
        $this->alamat->PlaceHolder = RemoveHtml($this->alamat->caption());

        // pekerjaan
        $this->pekerjaan->EditAttrs["class"] = "form-control";
        $this->pekerjaan->EditCustomAttributes = "";
        $this->pekerjaan->EditValue = $this->pekerjaan->CurrentValue;
        $this->pekerjaan->PlaceHolder = RemoveHtml($this->pekerjaan->caption());

        // alergi
        $this->alergi->EditAttrs["class"] = "form-control";
        $this->alergi->EditCustomAttributes = "";
        $this->alergi->EditValue = $this->alergi->CurrentValue;
        $this->alergi->PlaceHolder = RemoveHtml($this->alergi->caption());

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id_pasien);
                    $doc->exportCaption($this->nm_pasien);
                    $doc->exportCaption($this->tgl_lahir);
                    $doc->exportCaption($this->alamat);
                    $doc->exportCaption($this->pekerjaan);
                    $doc->exportCaption($this->alergi);
                } else {
                    $doc->exportCaption($this->nm_pasien);
                    $doc->exportCaption($this->tgl_lahir);
                    $doc->exportCaption($this->alamat);
                    $doc->exportCaption($this->pekerjaan);
                    $doc->exportCaption($this->alergi);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id_pasien);
                        $doc->exportField($this->nm_pasien);
                        $doc->exportField($this->tgl_lahir);
                        $doc->exportField($this->alamat);
                        $doc->exportField($this->pekerjaan);
                        $doc->exportField($this->alergi);
                    } else {
                        $doc->exportField($this->nm_pasien);
                        $doc->exportField($this->tgl_lahir);
                        $doc->exportField($this->alamat);
                        $doc->exportField($this->pekerjaan);
                        $doc->exportField($this->alergi);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        // No binary fields
        return false;
    }

    // Table level events

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email); var_dump($args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
