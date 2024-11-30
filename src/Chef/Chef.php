<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef;

use Borsch\Chef\Recipe\{CacheTable, Environment, Handler, Help, Middleware};
use InvalidArgumentException;
use League\CLImate\CLImate;

/**
 * Class Chef
 * @package Borsch\Chef
 */
class Chef
{

    /** @var CLImate */
    private CLImate $cli;

    /** @var RecipeInterface[] */
    private array $recipes;

    /**
     * Chef Constructor
     */
    public function __construct()
    {
        $this->cli = new CLImate();
        $this->cli->description('A good chef for a good borsch, your personal CLI.');

        $this->setDefaultRecipes();
        $this->loadRecipes($this->recipes);

        $this->cli->arguments->parse();
    }

    /**
     * @return void
     */
    private function setDefaultRecipes(): void
    {
        $this->recipes = [
            'help' => new Help(),
            'handler' => new Handler(),
            'middleware' => new Middleware(),
            'environment' => new Environment()
        ];
    }

    /**
     * @param array $recipes
     * @return void
     * @throws InvalidArgumentException
     */
    private function loadRecipes(array $recipes): void
    {
        foreach ($recipes as $name => $recipe) {
            if (!$recipe instanceof RecipeInterface) {
                throw new InvalidArgumentException(sprintf(
                    'Recipe "%s" is not a RecipeInterface instance.',
                    $name
                ));
            }

            $this->cli->arguments->add([
                $name => array_filter([
                    'prefix' => $recipe->getPrefix(),
                    'longPrefix'  => $recipe->getLongPrefix(),
                    'description' => $recipe->getDescription(),
                    'defaultValue' => $recipe->getDefaultValue(),
                    'required' => $recipe->isRequired(),
                    'noValue' => $recipe->hasNoValue(),
                    'castTo' => $recipe->castTo()
                ])
            ]);
        }
    }

    /**
     * @return void
     */
    public function run(): void
    {
        foreach ($this->recipes as $name => $recipe) {
            if ($this->cli->arguments->defined($name)) {
                $success = $this->recipes[$name]->execute($this->cli, $this->cli->arguments->get($name));

                if ($success) {
                    $this->cli->green($this->recipes[$name]->getSuccessMessage());
                } else {
                    $this->cli->red($this->recipes[$name]->getErrorMessage());
                }

                if ($recipe->stopExecution()) {
                    break;
                }
            }
        }
    }
}
