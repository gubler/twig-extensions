<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TableSortIconExtension extends AbstractExtension
{
    public const SORT_ICON_CLASSES_ASC = 'fas fa-chevron-circle-down';
    public const SORT_ICON_CLASSES_DESC = 'fas fa-chevron-circle-up';

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

    public function renderTableSortIcon(
        string $column,
        string $sortedColumn,
        string $sortDirection,
        string $sortIconClassesAsc = self::SORT_ICON_CLASSES_ASC,
        string $sortIconClassesDesc = self::SORT_ICON_CLASSES_DESC,
    ): string {
        if ($column === $sortedColumn && 'asc' === $sortDirection) {
            return '<i class="i' . $sortIconClassesAsc . ' pull-right"></i>';
        }

        if ($column === $sortedColumn && 'desc' === $sortDirection) {
            return '<i class="' . $sortIconClassesDesc . ' pull-right"></i>';
        }

        return '';
    }
}
