<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigTest;

class InstanceOfExtension extends AbstractExtension
{
    public function getTests(): array
    {
        return [
            new TwigTest(
                'instanceof',
                [$this, 'isInstanceOf']
            ),
        ];
    }

    /**
     * @param class-string $instance
     */
    public function isInstanceof(mixed $var, string $instance): bool
    {
        return $var instanceof $instance;
    }
}
