<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension;

use Gubler\Twig\Extension\Lib\MimeTypeToIconClass;
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
        return (new MimeTypeToIconClass())->getIconClass($mimeType, 'no.filename');
    }
}
