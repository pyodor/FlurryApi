<?php
App::uses('FlurryApiAppController', 'FlurryApi.Controller');
App::uses('Flurry', 'FlurryApi.Lib');
/**
/**
 * AppInfo Controller
 *
 */
class AppInfoController extends FlurryApiAppController {

    public $uses = array();

    public function index() {
        $flurry = new Flurry($this->api_access_code, $this->app_key);
        $new_users = Xml::toArray($flurry->getAppInfo());
        $versions = array_reverse($new_users['appInfo']['version']);
        unset($new_users['appInfo']['version']);
        $attr = $new_users['appInfo'];
        $this->set(compact('attr', 'versions'));
    }
}
