<?php

namespace App\Command;

use App\Services\SwapiService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SwapiImportDataCommand extends Command
{
    protected static $defaultName = 'swapi:importData';

    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

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
        $entityManager = $this->container->get('doctrine')->getManager();
        $i = 1;
        while ($arg1 > 0) {
            $record = (new SwapiService())->takeRecords($i);
            $entityManager->persist($record);
            $arg1--;
            $i++;
        }
        $entityManager->flush();
        //$io->success($record['name']);

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
    }
}
