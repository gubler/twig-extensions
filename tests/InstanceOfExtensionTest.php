<?php

namespace Gubler\Twig\Extension\Tests;

use Gubler\Twig\Extension\InstanceOfExtension;
use Twig\Test\IntegrationTestCase;

class IntegrationTest extends IntegrationTestCase
{
    public function getExtensions()
    {
        return [
            new InstanceOfExtension(),
        ];
    }

    public function getFixturesDir()
    {
        return __DIR__.'/Fixtures/';
    }
}