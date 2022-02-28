<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef;

use League\CLImate\CLImate;

/**
 * Class Recipe
 */
class Recipe implements RecipeInterface
{

    /** @var string */
    protected $success_message = '';

    /** @var string */
    protected $error_message = 'An error occurred.';

    /**
     * @inheritDoc
     */
    public function getPrefix(): ?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getLongPrefix(): ?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function isRequired(): ?bool
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function hasNoValue(): ?bool
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function castTo(): ?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function execute(CLImate $cli, ?string $param = null): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function stopExecution(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getSuccessMessage(): string
    {
        return $this->success_message;
    }

    /**
     * @inheritDoc
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }
}
