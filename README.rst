=================================================
Welcome to FlurryApi a CakePHP Plugin
=================================================

``FlurryApi`` is a CakePHP plugin that wraps the Flurry Analytics API, it allows you to plug directly the plugin and start anylayzing 
your app metrics in a visually stunning UI.

Features
------------------

- Covers the three analytics API (i.e AppMetrics, AppInfo & EventMetrics)
- Plug and Play once api_access_code and app_key is provided
- Visually stunning UI using maps and charts (TODO)


Installation
--------------

Make sure you properly baked your app::

    cake bake myapp
  
and provide the following parameters for your ``myapp``, database setup and some other stuffs.


Clone the plugin inside your ``myapp/Plugin`` directory::

    git clone http://[your_username]@202.172.229.26/rhodecode/FlurryApi

In your ``myapp/Config/bootstrap.php`` add this::

    CakePlugin::loadAll(array(
        'FlurryApi' => array('bootstrap' => false, 'routes' => true)
    ));

Provide your api access code and app key inside your ``core.php``::

    Configure::write('FlurryApi', array(
        'api_access_code' => 'your_api_access_code', // nano api access code
        'app_key' => 'your_app_key', // voice sms app
    ));
   
Usage
--------------

TODO

Configuration
--------------

TODO

Tests
--------------

TODO

TODO
----------------

- AppInfo & EventMetrics API 

License
-------

``FlurryApi`` is released under the WTFPL_ license.

Support
-----------------

Send me_ a bottle of beer or FORK_ it! :) 

.. _WTFPL: http://sam.zoy.org/wtfpl/
.. _me: dado@neseapl.com
.. _FORK: http://202.172.229.26/rhodecode/FlurryApi/fork

