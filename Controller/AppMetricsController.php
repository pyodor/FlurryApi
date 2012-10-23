<?php
App::uses('FlurryApiAppController', 'FlurryApi.Controller');
App::uses('Flurry', 'FlurryApi.Lib');
/**
/**
 * AppMetrics Controller
 *
 */
class AppMetricsController extends FlurryApiAppController {

    public $uses = array();

    public function index() {
        $api_access_code = 'RDW3J6SXHDWG2F3Z9ZHK';
        $app_key = '372Z3WPIDCWYSTL54BPM';
        $flurry = new Flurry($api_access_code, $app_key);
        debug($flurry->getMetric('RetainedUsers', '2012-10-02', '2012-10-23'));die;
    }
}
