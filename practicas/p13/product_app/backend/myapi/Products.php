<?php
namespace TECWEB\MYAPI;

use TECWEB\MYAPI\Create\Create;
use TECWEB\MYAPI\Read\Read;
use TECWEB\MYAPI\Update\Update;
use TECWEB\MYAPI\Delete\Delete;

class Products {

    public static function add($obj) {
        $c = new Create('marketzone', 'root', 'Alis2404'); 
        return $c->add($obj);
    }

    public static function edit($obj) {
        $u = new Update('marketzone', 'root', 'Alis2404');
        return $u->edit($obj);
    }

    public static function delete($id) {
        $d = new Delete('marketzone', 'root', 'Alis2404');
        return $d->delete($id);
    }

    public static function list() {
        $r = new Read('marketzone', 'root', 'Alis2404');
        return $r->list();
    }

    public static function search($search) {
        $r = new Read('marketzone', 'root', 'Alis2404');
        return $r->search($search);
    }

    public static function single($id) {
        $r = new Read('marketzone', 'root', 'Alis2404');
        return $r->single($id);
    }
}
