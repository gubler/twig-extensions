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

    /**
     * @param string $column
     * @param string $sortedColumn
     * @param string $sortDirection
     */
    public function renderTableSortIcon($column, $sortedColumn, $sortDirection): string
    {
        if ($column === $sortedColumn && 'asc' === $sortDirection) {
            return '<i class="fas fa-chevron-circle-down pull-right"></i>';
        } elseif ($column === $sortedColumn && 'desc' === $sortDirection) {
            return '<i class="fas fa-chevron-circle-up pull-right"></i>';
        }

        return '';
    }
}
