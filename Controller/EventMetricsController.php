<?php
App::uses('FlurryApiAppController', 'FlurryApi.Controller');
App::uses('Flurry', 'FlurryApi.Lib');
/**
/**
 * EventMetrics Controller
 *
 */
class EventMetricsController extends FlurryApiAppController {

    public $uses = array();

    public function index() {
        $date = $this->oneYearBackFromToday();
        $flurry = new Flurry($this->api_access_code, $this->app_key);
        $event_metrics = Xml::toArray($flurry->getEventMetric("Summary", $date['oneYearBack'], $date['today']));
        if(isset($event_metrics['eventMetrics']['event'])) {
            $data = array_reverse($event_metrics['eventMetrics']['event']);
            unset($event_metrics['eventMetrics']['event']);
        }
        $attr = $event_metrics['eventMetrics'];
        if(isset($data)) {
            $headers = $this->getHeaders($data[0]);;
        }
        $this->set(compact('attr', 'data', 'headers'));
    } 

    private function getHeaders($data) {
        $headers = array_keys($data);
        foreach($headers as $key => $header) {
            $headers[$key] = Inflector::humanize(Inflector::underscore(substr($header, 1)));
        }

        return $headers;
    }
}
