<?php
/**
 * Created by PhpStorm.
 * User: Kervin
 * Date: 1/9/18
 * Time: 8:38 PM
 */

namespace Greenjocote;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ShowCommand extends Command
{


    public function configure()
    {
        $this->setName('show')
            ->setDescription('Show all tasks');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }


}