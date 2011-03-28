<?php
namespace Tumf\PearBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Command\Command;

class PearCommand extends Command
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
        ->setName('pear:exec')
        ->setAliases(array('pear'))
        ->setDescription('PEAR command wrapper')
        ->setDefinition
        (array(
               new InputArgument('command',
                                 InputArgument::IS_ARRAY,
                                 'command [options...]'
                                 ),
               )
         );
    }

    /**
     * @see Command
     *
     * @throws \InvalidArgumentException When the app/.pearrc file does not exist
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $pear =  $this->container->getParameter('pear.command');
      $root =  $this->container->getParameter('kernel.root_dir');
      $rc =  implode(DIRECTORY_SEPARATOR,array($root,".pearrc"));
      
      $args = $input->getArgument("command");
      $command = "{$pear} -c {$rc}";
      array_shift($args);
      array_unshift($args,$command);
      system(implode(" ",$args));
    }
}
