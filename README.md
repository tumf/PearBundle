PearBundle
==========

Install
-------

    git submodule add -f git://github.com/tumf/PearBundle.git vendor/bundles/Tumf/PearBundle
    git submodule init
    git submodule update


### Register Bundle

     // app/AppKernel.php
     $bundles = array(
       new Tumf\PearBundle\PearBundle(),
     );

### Add autload

    // app/autoload.php
    $loader->registerNamespaces(array(
        // ...
        'Tumf\\PearBundle'      => __DIR__.'/../vendor/bundles',
        // ...
    ));


Usage
-----

### PEAR command wrapper.

* pear:exec <command> [<args>.... ]
* pear:init

### example

setup pear

    ./app/console pear:init


discover pear channnel

    ./app/console pear channel-discover openpear.org

install Wozozo_Unko from openpear

    ./app/console pear install openpear/Wozozo_Unko


Configuraion
------------

### app/config/config.yml

    pear:
      command: /path/to/pear
      
