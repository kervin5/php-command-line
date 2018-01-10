<?php
/**
 * Created by PhpStorm.
 * User: Kervin
 * Date: 1/9/18
 * Time: 8:38 PM
 */

namespace Greenjocote;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ShowCommand extends Command
{
    private $database;

    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;

        parent::__construct();
    }

    public function configure()
    {
        $this->setName('show')
            ->setDescription('Show all tasks');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->showTasks($output);
    }

    private function showTasks($output)
    {
        $this->database->fetchAll('tasks');

        $table = new Table($output);

        $table->setHeaders($output);

        $table->setHeaders(['Id','Description'])
            ->setRows($tasks)
            ->render();
    }
}