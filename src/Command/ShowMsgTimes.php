<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ShowMsgTimes extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'show-msg-times';

    protected function configure()
    {
        $this->setDescription('Показать сообщение n-раз')->setHelp('Use this command to show message');
        $this->addArgument("msg", InputArgument::REQUIRED, "Сообщение.");
        $this->addOption("times", 't', InputOption::VALUE_REQUIRED, "Количество выводимых сообщений");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $times = $input->getOption('times') ?? 2;

        for ($i=0; $i < $times; $i++) {
        	$output->writeln('Привет ' . $input->getArgument('msg'));
        }	

        return 0;
    }
}
