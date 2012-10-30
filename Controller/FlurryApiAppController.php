<?php

class FlurryApiAppController extends AppController {
    public $api_access_code;
    public $app_key;

    public function beforeFilter() {
        $this->loadUserConfig();
    }
    
    private function loadUserConfig() {
        $this->config = Configure::read("FlurryApi");
        if(!$this->config) {
            throw new CakeException('api access code and app key are required');
        }
        
        $this->api_access_code = $this->config['api_access_code'];
        $this->app_key = $this->config['app_key'];
    }

    public function oneYearBackFromToday() {
        $today = date('Y-m-d');
        $oneYearBack = date('Y-m-d', strtotime($today . '-1 year'));

        return compact("today", "oneYearBack");
    }

    public function xml_attribute($object, $attribute) {
        if(isset($object[$attribute]))
            return (string) $object[$attribute];
    }
}

