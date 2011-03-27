PearBundle
==========

    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Behat\\Gherkin'        => __DIR__.'/../vendor/gherkin/src',
        'Behat\\Behat'          => __DIR__.'/../vendor/behat/src',
        'Behat\\BehatBundle'    => __DIR__.'/../vendor/bundles',
        // ...
    ));


Install
-------

    git submodule add -f git://github.com/tumf/PearBundle.git vendor/bundles/Tumf/PearBundle
    git submodule init
    git submodule update

* app/AppKernel.php

     $bundles = array(
       new Tumf\PearBundle\PearBundle(),
     );
        

* app/autoload.php


    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Tumf\\PearBundle'      => __DIR__.'/../vendor/bundles',
        // ...
    ));


Usage
-----

PEAR command wrapper.

* pear:exec <command> [<args>.... ]
* pear:init
 

Configuraion
------------

* app/config/config.yml:

     pear:
       command: /path/to/pear
      
