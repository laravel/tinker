<?php

namespace Laravel\Tinker;

use ErrorException;
use Exception;
use Illuminate\Support\Str;
use Psy\CodeCleaner\NoReturnValue;
use Psy\Exception\BreakException;
use Psy\Exception\Exception as PsyException;
use Psy\Shell as BaseShell;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Shell extends BaseShell
{
    const BUFF_PROMPT = '  ';
    const PROMPT = '> ';

    /**
     * The OutputStyle instance.
     *
     * @var \Symfony\Component\Console\Style\SymfonyStyle
     */
    protected $output;

    /**
     * {@inheritdoc}
     */
    public function doRun(InputInterface $input, OutputInterface $output): int
    {
        return parent::doRun($input, $this->output = new SymfonyStyle($input, $output));
    }

    /**
     * {@inheritdoc}
     */
    protected function getHeader(): string
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function formatException(Exception $exception): string
    {
        $message = $exception->getMessage();

        if (Str::contains($message, 'psy/psysh/src/ExecutionLoopClosure.php')) {
            [$message] = explode(' in /', $message);
            [$message] = explode(' on line ', $message);
        }

        $severity = ($exception instanceof ErrorException) ? $this->getSeverity($exception) : 'error';

        if ($exception instanceof PsyException) {
            [$type] = explode(': ', $exception->getMessage());
            $message = str_replace("$type: ", '', $message);
            $type = trim(str_replace('PHP ', '', $type));
        } else {
            $type = get_class($exception);
        }

        $message = trim($message);

        // Ensures the given string ends with punctuation...
        if (! empty($message) && ! in_array(substr($message, -1), ['.', '?', '!', ':'])) {
            $message = "$message.";
        }

        // Ensures the given message only contains relative paths...
        $message = str_replace(base_path().'/', '', $message);

        if ($exception instanceof BreakException) {
            return sprintf("\n  <fg=white;bg=blue> INFO </> %s\n", $message);
        }

        if ($severity == 'warning') {
            return sprintf("\n  <fg=black;bg=yellow> WARN </> %s\n", $message);
        }

        return sprintf("\n  <fg=white;bg=red> %s </> %s\n", $type, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function writeReturnValue($ret, bool $rawOutput = false)
    {
        if ($rawOutput) {
            return parent::writeReturnValue($ret, $rawOutput);
        }

        if ($ret instanceof NoReturnValue) {
            return;
        }

        $formatted = $this->presentValue($ret);

        $message = collect(explode("\n", $formatted))->map(function ($line) {
            return $this->grayExists() ? "<fg=gray;>│ </>$line" : "│ $line";
        })->implode("\n");

        $this->output->writeln([$message, '']);
    }

    /**
     * Gets the Output instance.
     *
     * @return \Symfony\Component\Console\Output\OutputInterface
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Checks if the gray color exists on the output.
     *
     * @return bool
     */
    protected function grayExists()
    {
        try {
            $this->output->write('<fg=gray></>');
        } catch (InvalidArgumentException $e) {
            return false;
        }

        return true;
    }
}
