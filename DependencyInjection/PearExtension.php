<?php
namespace Tumf\PearBundle\DependencyInjection;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class PearExtension extends Extension
{
    function load(array $config, ContainerBuilder $container)
    {
      $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config/'));
      $loader->load('di.xml');
      if (isset($config[0]["command"])){
        $container->setParameter("pear.command",$config[0]["command"]);
      }
    }
    function getNamespace(){
      return "http://tumf.jp/pear";
    }
    function getXsdValidationBasePath(){}
    function getAlias()
    {
      return "pear";
    }
}