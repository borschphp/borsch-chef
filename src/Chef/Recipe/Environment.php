<?php

namespace Borsch\Chef\Recipe;

use Borsch\Chef\Recipe;
use League\CLImate\CLImate;

class Environment extends Recipe
{

    public function getLongPrefix(): ?string
    {
        return 'env';
    }

    public function getDescription(): ?string
    {
        return 'Print your application environment variables';
    }

    public function hasNoValue(): bool
    {
        return true;
    }

    public function execute(CLImate $cli, ?string $param = null): bool
    {
        $env_file = getcwd().'/.env';

        if (!file_exists($env_file)) {
            $this->error_message = sprintf('No environment file (.env) found in %s.', dirname($env_file));
            return false;
        }

        if (!is_readable($env_file)) {
            $this->error_message = sprintf('Environment file %s is not readable.', $env_file);
            return false;
        }

        $env = file_get_contents($env_file);
        $env = explode("\n", $env);
        $env = array_filter($env, function($line) {
            return !empty($line) && !str_starts_with($line, '#');
        });

        $env = array_map(function($line) {
            $line = explode('=', $line);
            return [
                'key' => $line[0],
                'value' => $line[1] ?? ''
            ];
        }, $env);

        $cli->table($env);

        return true;
    }
}