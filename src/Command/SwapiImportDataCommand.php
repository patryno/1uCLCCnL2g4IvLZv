<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SwapiImportDataCommand extends Command
{
    protected static $defaultName = 'swapi:importData';

    protected function configure()
    {
        $this
            ->setDescription('Imports records from swapi')
            ->addArgument('recordsNumber', InputArgument::OPTIONAL, 'Number of records to take')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'None');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('recordsNumber');
        $io->success($arg1);

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
