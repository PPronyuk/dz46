<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ShowMsg extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'show-msg';

    protected function configure()
    {
        $this->setDescription('Показать сообщение')->setHelp('Use this command to show message');
        $this->addArgument("msg", InputArgument::REQUIRED, "Введите сообщение.");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Привет ' . $input->getArgument('msg'));

        return 0;
    }
}
