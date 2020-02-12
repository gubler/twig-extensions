<?php

namespace Gubler\Twig\Extension\Tests;

use Gubler\Twig\Extension\TruncateExtension;
use Twig\Test\IntegrationTestCase;

class TruncateExtensionTest extends IntegrationTestCase
{
    public function getExtensions(): array
    {
        return [
            new TruncateExtension(),
        ];
    }

    public function getFixturesDir(): string
    {
        return __DIR__.'/Fixtures/Truncate';
    }
}
