<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef\Recipe;

use Borsch\Chef\Recipe;
use League\CLImate\CLImate;

/**
 * Class Help
 */
class Help extends Recipe
{

    /**
     * @inheritDoc
     */
    public function getPrefix(): ?string
    {
        return 'h';
    }

    /**
     * @inheritDoc
     */
    public function getLongPrefix(): ?string
    {
        return 'help';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return 'Prints a usage statement';
    }

    /**
     * @inheritDoc
     */
    public function hasNoValue(): ?bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function execute(CLImate $cli, ?string $param = null): bool
    {
        $cli->usage();

        return true;
    }
}
