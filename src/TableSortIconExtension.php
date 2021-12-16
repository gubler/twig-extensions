<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TableSortIconExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'tableSortIcon',
                [$this, 'renderTableSortIcon'],
                [
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }

    public function renderTableSortIcon(string $column, string $sortedColumn, string $sortDirection): string
    {
        if ($column === $sortedColumn && 'asc' === $sortDirection) {
            return '<i class="fas fa-chevron-circle-down pull-right"></i>';
        }

        if ($column === $sortedColumn && 'desc' === $sortDirection) {
            return '<i class="fas fa-chevron-circle-up pull-right"></i>';
        }

        return '';
    }
}
