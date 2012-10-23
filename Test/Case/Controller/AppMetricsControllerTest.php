<?php
App::uses('AppMetricsController', 'FlurryApi.Controller');

/**
 * AppMetricsController Test Case
 *
 */
class AppMetricsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.flurry_api.app_metric',
		'plugin.flurry_api.user',
		'plugin.flurry_api.aro',
		'plugin.flurry_api.aco',
		'plugin.flurry_api.permission',
		'plugin.flurry_api.profile'
	);

}
