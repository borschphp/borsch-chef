<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef;

use League\CLImate\CLImate;

/**
 * Interface RecipeInterface
 */
interface RecipeInterface
{

    /**
     * The short prefix version of your argument without any dashes (-u).
     *
     * @return string|null
     */
    public function getPrefix(): ?string;

    /**
     * The long prefix version of your argument without any dashes (–user).
     *
     * @return string|null
     */
    public function getLongPrefix(): ?string;

    /**
     * A helpful explanation of the argument.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * A default value if a value is not passed.
     *
     * @return mixed
     */
    public function getDefaultValue();

    /**
     * Whether the argument is required.
     *
     * @return bool|null
     */
    public function isRequired(): ?bool;

    /**
     * If the argument does not require a value, it is simply passed, the value is automatically cast to a boolean.
     *
     * @return bool|null
     */
    public function hasNoValue(): ?bool;

    /**
     * Cast the value of the argument to either a ‘string’, ‘int’, ‘float’, or ‘bool’.
     *
     * @return string|null
     */
    public function castTo(): ?string;

    /**
     * Whether the script should stop after execution or if it should continue to other arguments.
     *
     * @return bool
     */
    public function stopExecution(): bool;

    /**
     * @param CLImate $cli
     * @param string|null $param
     * @return bool
     */
    public function execute(CLImate $cli, ?string $param = null): bool;

    /**
     * Will be displayed if self::execute() returns true.
     *
     * @return string
     */
    public function getSuccessMessage(): string;

    /**
     * Will be displayed if self::execute() returns false.
     *
     * @return string
     */
    public function getErrorMessage(): string;
}