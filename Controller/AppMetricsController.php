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
        $this->metric('NewUsers');
        $this->render('metrics');
    }

    public function active_users() {
        $this->metric('ActiveUsers');
        $this->render('metrics');
    }
    
    public function median_session_length() {
        $this->metric('MedianSessionLength');
        $this->render('metrics');
    }
    
    public function avg_session_length() {
        $this->metric('AvgSessionLength');
        $this->render('metrics');
    }
    
    public function sessions() {
        $this->metric('Sessions');
        $this->render('metrics');
    }
    
    public function retained_users() {
        $this->metric('RetainedUsers');
        $this->render('metrics');
    }
    
    public function page_views() {
        $this->metric('PageViews');
        $this->render('metrics');
    }

    public function avg_page_views_per_session() {
        $this->metric('AvgPageViewsPerSession');
        $this->render('metrics');
    }

    private function metric($metric) {
        $date = $this->oneYearBackFromToday();
        $flurry = new Flurry($this->api_access_code, $this->app_key);
        $new_users = Xml::toArray($flurry->getAppMetric($metric, $date['oneYearBack'], $date['today'], false, 'months'));
        $data = array_reverse($new_users['appMetrics']['day']);
        unset($new_users['appMetrics']['day']);
        $attr = $new_users['appMetrics'];
        $this->set(compact('attr', 'data'));
    } 
}
