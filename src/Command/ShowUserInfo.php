<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class ShowUserInfo extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'show-user-info';

    protected function configure()
    {
        $this->setDescription('Вывод информации о пользвоателе')->setHelp('Use this command to get and show user info.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question('Введите Ваше имя: ', false);

        while (! $name = $helper->ask($input, $output, $question)); 


        $question = new Question('Введите Ваш возраст: ', 0);
        $question->setValidator(function ($answer) {
            if (! $answer || ! preg_match("/^[0-9]+$/", $answer)) {
                throw new \RuntimeException('Возраст должен быть числом больше 0.');
            }

            return $answer; });

        $age = $helper->ask($input, $output, $question);


        $question = new ChoiceQuestion( 'Выберите Ваш пол: ', ['М', 'Ж'], 'М');
        $question->setErrorMessage('Несуществующее значение.');

        $gender = $helper->ask($input, $output, $question);


        $output->writeln("Здравствуйте, $name. Ваш возраст $age. Ваш пол $gender.");

        return 0;
    }
}
