<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef\Recipe;

use Borsch\Chef\{FileCreatorTrait, Recipe};
use League\CLImate\CLImate;

/**
 * Class Handler
 */
class Handler extends Recipe
{

    use FileCreatorTrait;

    /**
     * @inheritDoc
     */
    public function getLongPrefix(): ?string
    {
        return 'handler';
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return 'Create an handler';
    }

    /**
     * @inheritDoc
     */
    public function execute(CLImate $cli, ?string $param = null): bool
    {
        return $this->createFileFromTemplate($param, 'handler');
    }
}
