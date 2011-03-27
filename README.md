PearBundle
==========

Install
-------

    git submodule add -f git://github.com/tumf/PearBundle.git vendor/bundles/Tumf/PearBundle
    git submodule init
    git submodule update


Bundleの登録

     // app/AppKernel.php
     $bundles = array(
       new Tumf\PearBundle\PearBundle(),
     );

オートロードへの追加

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
      
