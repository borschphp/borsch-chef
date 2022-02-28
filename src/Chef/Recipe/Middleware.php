<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef\Recipe;

use Borsch\Chef\FileCreatorTrait;
use Borsch\Chef\Recipe;
use League\CLImate\CLImate;

/**
 * Class Middleware
 */
class Middleware extends Recipe
{

    use FileCreatorTrait;

    /**
     * @inheritDoc
     */
    public function getLongPrefix(): ?string
    {
        return 'middleware';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return 'Create a middleware';
    }

    /**
     * @inheritDoc
     */
    public function execute(CLImate $cli, ?string $param = null): bool
    {
        return $this->createFileFromTemplate($param, 'middleware');
    }
}
