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
        $this->redirect('new_users');
    }

    public function new_users() {
        $date = $this->oneYearBackFromToday();
        $flurry = new Flurry($this->api_access_code, $this->app_key);
        $m = $flurry->getMetric('NewUsers', $date['oneYearBack'], $date['today'], false, 'months');
        debug($m);die;
    }
}
