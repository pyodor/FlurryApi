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
        $app_info = Xml::toArray($flurry->getAppInfo());
        $versions = array_reverse($app_info['appInfo']['version']);
        unset($app_info['appInfo']['version']);
        $attr = $app_info['appInfo'];
        $this->set(compact('attr', 'versions'));
    }
}
