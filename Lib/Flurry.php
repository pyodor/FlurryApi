<?php
class Flurry {
	
	protected $api_access;
    protected $app_key;

    function __construct($api, $app){
		$this->api_access = $api;
		$this->app_key = $app;
	}

	public function getMetric($metricName, $startDate, $endDate, $country=FALSE, $versionName=FALSE){
		$URLRequest = "http://api.flurry.com/appMetrics/$metricName?apiAccessCode=$this->api_access&apiKey=$this->app_key&startDate=$startDate&endDate=$endDate";
		if ($country)
			$URLRequest .= "&country=$country";
		if ($versionName)
			$URLRequest .= "&versionName=$versionName";
        
        $data = array();
		$config = array(
			'http' => array(
				'header' => 'Accept: application/xml',
				'method' => 'GET',
				'ignore_errors' => true
			)
		);

		$stream = stream_context_create($config);
		$xml = file_get_contents($URLRequest,false,$stream);

		$metricValues = new SimpleXMLElement($xml);
		return $metricValues;
	}

	public function getAllMetrics($startDate, $endDate, $country=FALSE, $versionName=FALSE){
		$metrics = array();
		
		$metrics["ActiveUsers"] = getMetric("ActiveUsers", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["ActiveUsersByWeek"] = getMetric("ActiveUsersByWeek", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["ActiveUsersByMonth"] = getMetric("ActiveUsersByMonth", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["NewUsers"] = getMetric("NewUsers", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["MedianSessionLength"] = getMetric("MedianSessionLength", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["AvgSessionLength"] = getMetric("AvgSessionLength", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["Sessions"] = getMetric("Sessions", $startDate, $endDate, $country, $versionName);
		sleep(1);
		$metrics["RetainedUsers"] = getMetric("RetainedUsers", $startDate, $endDate, $country, $versionName);

		return $metrics;
	}

}

?>
