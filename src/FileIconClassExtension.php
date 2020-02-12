<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension;

use Gubler\Twig\Lib\MimeTypeToIconClass;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FileIconClassExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter(
                'fileIconClass',
                [$this, 'mimeTypeToFileIconClass']
            ),
        ];
    }

    public function mimeTypeToFileIconClass(string $mimeType): string
    {
        $converter = new MimeTypeToIconClass();

        return $converter->getIconClass($mimeType, 'no.filename');
    }
}
