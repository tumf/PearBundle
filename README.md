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

### Add autoload

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

install Acme_Morningmusume from openpear

    ./app/console pear install openpear/Acme_Morningmusume

add autoload.php

    $loader->registerPrefixes(array(
        //...
        'Acme_'                            => __DIR__.'/../vendor/pear/php',
    ));

use

    $mm = new \Acme_MorningMusume;
    var_dump($mm->members);

Configuraion
------------

### app/config/config.yml

    pear:
      command: /path/to/pear
      
