<?php

namespace Gubler\Twig\Extension\Tests;

use Gubler\Twig\Extension\InstanceOfExtension;
use Twig\Test\IntegrationTestCase;

class InstanceOfExtensionTest extends IntegrationTestCase
{
    public function getExtensions(): array
    {
        return [
            new InstanceOfExtension(),
        ];
    }

    public function getFixturesDir(): string
    {
        return __DIR__.'/Fixtures/InstanceOf';
    }
}
