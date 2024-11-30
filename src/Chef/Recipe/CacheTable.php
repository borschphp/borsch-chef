<?php

namespace Borsch\Chef\Recipe;

use Borsch\Chef\Recipe;
use League\CLImate\CLImate;

class CacheTable extends Recipe
{

    public function getLongPrefix(): ?string
    {
        return 'cache-table';
    }

    public function getDescription(): ?string
    {
        return 'Create the cache table in the SQLite database';
    }

    public function hasNoValue(): bool
    {
        return true;
    }

    public function execute(CLImate $cli, ?string $param = null): bool
    {

        return true;
    }
}