<?php
/**
 * @author debuss-a
 */

namespace Borsch\Chef;

use SplFileObject;

/**
 * Trait FileCreatorTrait
 */
trait FileCreatorTrait
{

    /**
     * @inheritDoc
     */
    public function createFileFromTemplate(string $name, string $template_file): bool
    {
        $filename = sprintf('%s/src/%s/%s.php', getcwd(), ucfirst($template_file), $name);
        $dirname = dirname($filename);

        if (!is_writable($dirname)) {
            $this->error_message = sprintf('%s is not writable.', $dirname);
            return false;
        }

        if (file_exists($filename)) {
            $this->error_message = sprintf('%s already exists.', $filename);
            return false;
        }

        $file = new SplFileObject($filename, 'w');
        if (!$file->isWritable()) {
            $this->error_message = sprintf('%s is not writable.', $file->getPath());
            return false;
        }

        $template = new SplFileObject(sprintf('%s/Template/%s', __DIR__, $template_file));
        if (!$template->isReadable()) {
            $this->error_message = sprintf('Template %s is not readable.', $template->getPath());
            return false;
        }

        $content = str_replace(
            sprintf('{New%sName}', ucfirst($template_file)),
            $name,
            $template->fread($template->getSize())
        );

        if (!$file->fwrite($content)) {
            $this->error_message = sprintf('Unable to create file %s.', $file->getPath());
            return false;
        }

        $this->success_message = sprintf('Handler "%s" created.', $name);
        return true;
    }
}