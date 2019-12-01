<?php

namespace SylvainDeloux\SymfonyQuickwins\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Lock;

abstract class BaseCommand extends Command
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $store = new Lock\Store\FlockStore(sys_get_temp_dir());
        $factory = class_exists(Lock\LockFactory::class) ? new Lock\LockFactory($store) : new Lock\Factory($store); // BC with symfony/lock < 5
        $lock = $factory->createLock($this->getName());

        if ($lock->acquire()) {
            $this->preExecute();;
            $this->doExecute();
            $this->postExecute();
            $lock->release();
        } else {
            $output->writeln('Command is locked.');
        }

        return 0;
    }

    public function askForUserInput(string $message, bool $isHidden = false): ?string
    {
        $question = new Question(sprintf('<comment>%s:</comment> ', $message));

        if ($isHidden) {
            $question->setHidden(true);
            $question->setHiddenFallback(false);
        }

        $helper = $this->getHelper('question');

        return $helper->ask($this->input, $this->output, $question);
    }

    public function askForUserConfirmation(string $message, bool $defaultReply = true): bool
    {
        if (!$this->input->isInteractive()) {
            return $defaultReply;
        }

        $choices = $defaultReply ? '[Y/n]' : '[y/N]';

        $question = new ConfirmationQuestion(sprintf('<comment>%s</comment> %s ', $message, $choices), $defaultReply);

        $helper = $this->getHelper('question');

        return $helper->ask($this->input, $this->output, $question);
    }

    abstract public function doExecute();

    public function preExecute() { }
    public function postExecute() { }
}
