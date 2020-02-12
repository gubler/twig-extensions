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
     * @param mixed  $var
     * @param string $instance
     */
    public function isInstanceof($var, $instance): bool
    {
        return $var instanceof $instance;
    }
}
