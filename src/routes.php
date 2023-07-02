<?php

namespace PHPMaker2021\webklinik;

use Slim\App;
use Slim\Routing\RouteCollectorProxy;

// Handle Routes
return function (App $app) {
    // tb_admin
    $app->any('/tbadminlist[/{id_admin}]', TbAdminController::class . ':list')->add(PermissionMiddleware::class)->setName('tbadminlist-tb_admin-list'); // list
    $app->any('/tbadminadd[/{id_admin}]', TbAdminController::class . ':add')->add(PermissionMiddleware::class)->setName('tbadminadd-tb_admin-add'); // add
    $app->any('/tbadminview[/{id_admin}]', TbAdminController::class . ':view')->add(PermissionMiddleware::class)->setName('tbadminview-tb_admin-view'); // view
    $app->any('/tbadminedit[/{id_admin}]', TbAdminController::class . ':edit')->add(PermissionMiddleware::class)->setName('tbadminedit-tb_admin-edit'); // edit
    $app->any('/tbadmindelete[/{id_admin}]', TbAdminController::class . ':delete')->add(PermissionMiddleware::class)->setName('tbadmindelete-tb_admin-delete'); // delete
    $app->group(
        '/tb_admin',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id_admin}]', TbAdminController::class . ':list')->add(PermissionMiddleware::class)->setName('tb_admin/list-tb_admin-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id_admin}]', TbAdminController::class . ':add')->add(PermissionMiddleware::class)->setName('tb_admin/add-tb_admin-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id_admin}]', TbAdminController::class . ':view')->add(PermissionMiddleware::class)->setName('tb_admin/view-tb_admin-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id_admin}]', TbAdminController::class . ':edit')->add(PermissionMiddleware::class)->setName('tb_admin/edit-tb_admin-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id_admin}]', TbAdminController::class . ':delete')->add(PermissionMiddleware::class)->setName('tb_admin/delete-tb_admin-delete-2'); // delete
        }
    );

    // tb_pasien
    $app->any('/tbpasienlist[/{id_pasien}]', TbPasienController::class . ':list')->add(PermissionMiddleware::class)->setName('tbpasienlist-tb_pasien-list'); // list
    $app->any('/tbpasienadd[/{id_pasien}]', TbPasienController::class . ':add')->add(PermissionMiddleware::class)->setName('tbpasienadd-tb_pasien-add'); // add
    $app->any('/tbpasienview[/{id_pasien}]', TbPasienController::class . ':view')->add(PermissionMiddleware::class)->setName('tbpasienview-tb_pasien-view'); // view
    $app->any('/tbpasienedit[/{id_pasien}]', TbPasienController::class . ':edit')->add(PermissionMiddleware::class)->setName('tbpasienedit-tb_pasien-edit'); // edit
    $app->any('/tbpasiendelete[/{id_pasien}]', TbPasienController::class . ':delete')->add(PermissionMiddleware::class)->setName('tbpasiendelete-tb_pasien-delete'); // delete
    $app->group(
        '/tb_pasien',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id_pasien}]', TbPasienController::class . ':list')->add(PermissionMiddleware::class)->setName('tb_pasien/list-tb_pasien-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id_pasien}]', TbPasienController::class . ':add')->add(PermissionMiddleware::class)->setName('tb_pasien/add-tb_pasien-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id_pasien}]', TbPasienController::class . ':view')->add(PermissionMiddleware::class)->setName('tb_pasien/view-tb_pasien-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id_pasien}]', TbPasienController::class . ':edit')->add(PermissionMiddleware::class)->setName('tb_pasien/edit-tb_pasien-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id_pasien}]', TbPasienController::class . ':delete')->add(PermissionMiddleware::class)->setName('tb_pasien/delete-tb_pasien-delete-2'); // delete
        }
    );

    // tb_pengunjung
    $app->any('/tbpengunjunglist[/{id}]', TbPengunjungController::class . ':list')->add(PermissionMiddleware::class)->setName('tbpengunjunglist-tb_pengunjung-list'); // list
    $app->any('/tbpengunjungadd[/{id}]', TbPengunjungController::class . ':add')->add(PermissionMiddleware::class)->setName('tbpengunjungadd-tb_pengunjung-add'); // add
    $app->any('/tbpengunjungview[/{id}]', TbPengunjungController::class . ':view')->add(PermissionMiddleware::class)->setName('tbpengunjungview-tb_pengunjung-view'); // view
    $app->any('/tbpengunjungedit[/{id}]', TbPengunjungController::class . ':edit')->add(PermissionMiddleware::class)->setName('tbpengunjungedit-tb_pengunjung-edit'); // edit
    $app->any('/tbpengunjungdelete[/{id}]', TbPengunjungController::class . ':delete')->add(PermissionMiddleware::class)->setName('tbpengunjungdelete-tb_pengunjung-delete'); // delete
    $app->group(
        '/tb_pengunjung',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', TbPengunjungController::class . ':list')->add(PermissionMiddleware::class)->setName('tb_pengunjung/list-tb_pengunjung-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', TbPengunjungController::class . ':add')->add(PermissionMiddleware::class)->setName('tb_pengunjung/add-tb_pengunjung-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', TbPengunjungController::class . ':view')->add(PermissionMiddleware::class)->setName('tb_pengunjung/view-tb_pengunjung-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', TbPengunjungController::class . ':edit')->add(PermissionMiddleware::class)->setName('tb_pengunjung/edit-tb_pengunjung-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', TbPengunjungController::class . ':delete')->add(PermissionMiddleware::class)->setName('tb_pengunjung/delete-tb_pengunjung-delete-2'); // delete
        }
    );

    // tb_periksa
    $app->any('/tbperiksalist[/{id}]', TbPeriksaController::class . ':list')->add(PermissionMiddleware::class)->setName('tbperiksalist-tb_periksa-list'); // list
    $app->any('/tbperiksaadd[/{id}]', TbPeriksaController::class . ':add')->add(PermissionMiddleware::class)->setName('tbperiksaadd-tb_periksa-add'); // add
    $app->any('/tbperiksaview[/{id}]', TbPeriksaController::class . ':view')->add(PermissionMiddleware::class)->setName('tbperiksaview-tb_periksa-view'); // view
    $app->any('/tbperiksaedit[/{id}]', TbPeriksaController::class . ':edit')->add(PermissionMiddleware::class)->setName('tbperiksaedit-tb_periksa-edit'); // edit
    $app->any('/tbperiksadelete[/{id}]', TbPeriksaController::class . ':delete')->add(PermissionMiddleware::class)->setName('tbperiksadelete-tb_periksa-delete'); // delete
    $app->group(
        '/tb_periksa',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', TbPeriksaController::class . ':list')->add(PermissionMiddleware::class)->setName('tb_periksa/list-tb_periksa-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id}]', TbPeriksaController::class . ':add')->add(PermissionMiddleware::class)->setName('tb_periksa/add-tb_periksa-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id}]', TbPeriksaController::class . ':view')->add(PermissionMiddleware::class)->setName('tb_periksa/view-tb_periksa-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id}]', TbPeriksaController::class . ':edit')->add(PermissionMiddleware::class)->setName('tb_periksa/edit-tb_periksa-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id}]', TbPeriksaController::class . ':delete')->add(PermissionMiddleware::class)->setName('tb_periksa/delete-tb_periksa-delete-2'); // delete
        }
    );

    // tbobat
    $app->any('/tbobatlist[/{id_obat}]', TbobatController::class . ':list')->add(PermissionMiddleware::class)->setName('tbobatlist-tbobat-list'); // list
    $app->any('/tbobatadd[/{id_obat}]', TbobatController::class . ':add')->add(PermissionMiddleware::class)->setName('tbobatadd-tbobat-add'); // add
    $app->any('/tbobatview[/{id_obat}]', TbobatController::class . ':view')->add(PermissionMiddleware::class)->setName('tbobatview-tbobat-view'); // view
    $app->any('/tbobatedit[/{id_obat}]', TbobatController::class . ':edit')->add(PermissionMiddleware::class)->setName('tbobatedit-tbobat-edit'); // edit
    $app->any('/tbobatdelete[/{id_obat}]', TbobatController::class . ':delete')->add(PermissionMiddleware::class)->setName('tbobatdelete-tbobat-delete'); // delete
    $app->group(
        '/tbobat',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id_obat}]', TbobatController::class . ':list')->add(PermissionMiddleware::class)->setName('tbobat/list-tbobat-list-2'); // list
            $group->any('/' . Config("ADD_ACTION") . '[/{id_obat}]', TbobatController::class . ':add')->add(PermissionMiddleware::class)->setName('tbobat/add-tbobat-add-2'); // add
            $group->any('/' . Config("VIEW_ACTION") . '[/{id_obat}]', TbobatController::class . ':view')->add(PermissionMiddleware::class)->setName('tbobat/view-tbobat-view-2'); // view
            $group->any('/' . Config("EDIT_ACTION") . '[/{id_obat}]', TbobatController::class . ':edit')->add(PermissionMiddleware::class)->setName('tbobat/edit-tbobat-edit-2'); // edit
            $group->any('/' . Config("DELETE_ACTION") . '[/{id_obat}]', TbobatController::class . ':delete')->add(PermissionMiddleware::class)->setName('tbobat/delete-tbobat-delete-2'); // delete
        }
    );

    // v_pengunjung_hariini
    $app->any('/vpengunjunghariinilist[/{id}]', VPengunjungHariiniController::class . ':list')->add(PermissionMiddleware::class)->setName('vpengunjunghariinilist-v_pengunjung_hariini-list'); // list
    $app->group(
        '/v_pengunjung_hariini',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', VPengunjungHariiniController::class . ':list')->add(PermissionMiddleware::class)->setName('v_pengunjung_hariini/list-v_pengunjung_hariini-list-2'); // list
        }
    );

    // v_pengunjung_thismonth
    $app->any('/vpengunjungthismonthlist[/{id}]', VPengunjungThismonthController::class . ':list')->add(PermissionMiddleware::class)->setName('vpengunjungthismonthlist-v_pengunjung_thismonth-list'); // list
    $app->group(
        '/v_pengunjung_thismonth',
        function (RouteCollectorProxy $group) {
            $group->any('/' . Config("LIST_ACTION") . '[/{id}]', VPengunjungThismonthController::class . ':list')->add(PermissionMiddleware::class)->setName('v_pengunjung_thismonth/list-v_pengunjung_thismonth-list-2'); // list
        }
    );

    // error
    $app->any('/error', OthersController::class . ':error')->add(PermissionMiddleware::class)->setName('error');

    // login
    $app->any('/login', OthersController::class . ':login')->add(PermissionMiddleware::class)->setName('login');

    // logout
    $app->any('/logout', OthersController::class . ':logout')->add(PermissionMiddleware::class)->setName('logout');

    // Swagger
    $app->get('/' . Config("SWAGGER_ACTION"), OthersController::class . ':swagger')->setName(Config("SWAGGER_ACTION")); // Swagger

    // Index
    $app->any('/[index]', OthersController::class . ':index')->add(PermissionMiddleware::class)->setName('index');

    // Route Action event
    if (function_exists(PROJECT_NAMESPACE . "Route_Action")) {
        Route_Action($app);
    }

    /**
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: Make sure this route is defined last.
     */
    $app->map(
        ['GET', 'POST', 'PUT', 'DELETE', 'PATCH'],
        '/{routes:.+}',
        function ($request, $response, $params) {
            $error = [
                "statusCode" => "404",
                "error" => [
                    "class" => "text-warning",
                    "type" => Container("language")->phrase("Error"),
                    "description" => str_replace("%p", $params["routes"], Container("language")->phrase("PageNotFound")),
                ],
            ];
            Container("flash")->addMessage("error", $error);
            return $response->withStatus(302)->withHeader("Location", GetUrl("error")); // Redirect to error page
        }
    );
};
