<?php
/**
 * Created by PhpStorm.
 * User: Kervin
 * Date: 1/9/18
 * Time: 9:46 PM
 */

namespace Greenjocote;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CompleteCommnad extends Command
{
    public function configure()
    {
        $this->setName('complete')
            ->setDescription('Complete task by its id')
            ->addArgument('id',InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->database->query('delete from tasks where id = :id', compact('id'));

        $output->writeln('<info>Task Completed!</info>');

        $this->showTasks($output);
    }
}