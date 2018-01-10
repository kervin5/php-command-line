<?php
/**
 * Created by PhpStorm.
 * User: Kervin
 * Date: 1/9/18
 * Time: 9:31 PM
 */

namespace Greenjocote;

use Symfony\Component\Console\Command\Command as SynfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SynfonyCommand
{

    protected $database;

    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    protected function showTasks(OutputInterface $output)
    {
        if( ! $tasks = $this->database->fetchAll('tasks'))
        {
            return $output->writeln('<info>No tasks at the moment!</info>');
        }

        $table = new Table($output);

        $table->setHeaders(['Id','Description'])
            ->setRows($tasks)
            ->render();
    }
}