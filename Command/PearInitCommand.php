<?php
namespace Tumf\PearBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Command\Command;

use Tumf\PearBundle\Command\Common;

class PearInitCommand extends Command
{
    protected $container;

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->container = $this->application->getKernel()->getContainer();
    }
    /**
     * @see Command
     */
    protected function configure()
    {
      $this
        ->setName('pear:init')
        ->setDescription('PEAR command wrapper initializer')
        ->setDefinition(array());
    }

    /**
     * @see Command
     *
     * @throws \InvalidArgumentException When the target directory does not exist
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $pear =  $this->container->getParameter('pear.command');
      $root =  $this->container->getParameter('kernel.root_dir');
      $rc =  implode(DIRECTORY_SEPARATOR,array($root,".pearrc"));
      system("{$pear} config-create {$root} {$rc} > /dev/null");

      $confs = array(
            "bin_dir"   => "{$root}/../vendor/pear",
            "doc_dir"   => "{$root}/../vendor/pear/docs",
            "ext_dir"   => "{$root}/../vendor/pear/ext",
            "php_dir"   => "{$root}/../vendor/pear/php",
            "cache_dir" => "{$root}/../vendor/pear/cache",
            "cfg_dir"   => "{$root}/../vendor/pear/cfg",
            "data_dir"  => "{$root}/../vendor/pear/data",
            "download_dir" => "{$root}/../vendor/pear/download",
            "temp_dir"  => "{$root}/../vendor/pear/temp",
            "test_dir"  => "{$root}/../vendor/pear/tests",
            "www_dir"   => "{$root}/../vendor/pear/www",
            );
      foreach ($confs as $var => $val){
        $val = realpath($val);
        system("{$pear} -c {$rc} config-set {$var} {$val} > /dev/null");
      }
      system("{$pear} -c {$rc} config-show");
    }
}
