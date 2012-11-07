<?php
class Flurry extends Object {
	
	protected $api_access;
    protected $app_key;

    function __construct($api, $app){
		$this->api_access = $api;
		$this->app_key = $app;
	}
    
    public function getAppInfo(){
		$URLRequest = "http://api.flurry.com/appInfo/getApplication?apiAccessCode=$this->api_access&apiKey=$this->app_key";

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

    public function getEventMetric($metricName, $startDate, $endDate, $versionName=FALSE, $eventName=FALSE){
		$URLRequest = "http://api.flurry.com/eventMetrics/$metricName?apiAccessCode=$this->api_access&apiKey=$this->app_key&startDate=$startDate&endDate=$endDate";

		if ($versionName)
			$URLRequest .= "&versionName=$versionName";

        if($metricName=="Event") {
            if($eventName) 
                $URLRequest .= "&eventName=$eventName";
            else
                throw new CakeException('Event Name required');
        }

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

	public function getAppMetric($metricName, $startDate, $endDate, $country=FALSE, $groupBy=FALSE, $versionName=FALSE){
		$URLRequest = "http://api.flurry.com/appMetrics/$metricName?apiAccessCode=$this->api_access&apiKey=$this->app_key&startDate=$startDate&endDate=$endDate";
		if ($country)
            $URLRequest .= "&country=$country";
        
        if ($groupBy && $metricName != 'ActiveUsersByWeek' && 
            $metricName != 'ActiveUsers' && $metricName != 'ActiveUsersByMonth'  ) 
            $URLRequest .= "&groupBy=$groupBy";

		if ($versionName)
			$URLRequest .= "&versionName=$versionName";

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

	public function getAllAppMetrics($startDate, $endDate, $country=FALSE, $groupBy=FALSE, $versionName=FALSE){
		$metrics = array();
		
		$metrics["ActiveUsers"] = $this->getMetric("ActiveUsers", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["ActiveUsersByWeek"] = $this->getMetric("ActiveUsersByWeek", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["ActiveUsersByMonth"] = $this->getMetric("ActiveUsersByMonth", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["NewUsers"] = $this->getMetric("NewUsers", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["MedianSessionLength"] = $this->getMetric("MedianSessionLength", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["AvgSessionLength"] = $this->getMetric("AvgSessionLength", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["Sessions"] = $this->getMetric("Sessions", $startDate, $endDate, $country, $groupBy, $versionName);
		sleep(1);
		$metrics["RetainedUsers"] = $this->getMetric("RetainedUsers", $startDate, $endDate, $country, $groupBy, $versionName);

		return $metrics;
	}

}

?>
