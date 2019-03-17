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

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $recordsNumber = $input->getArgument('recordsNumber');
        if($recordsNumber) {
            $io->success($recordsNumber);
        } else {
            $io->error('Please set number of records to import');
            return;
        }
        $objectManager = $this->container->get('doctrine')->getManager();
        (new SwapiService())->importRecords($recordsNumber, $objectManager);


        $io->success('Records are imported');
    }
}
