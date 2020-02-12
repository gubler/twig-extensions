<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension\Lib;

class MimeTypeToIconClass
{
    public const ICON_EXCEL = 'far fa-file-excel';
    public const ICON_POWERPOINT = 'far fa-file-powerpoint';
    public const ICON_WORD = 'far fa-file-word';
    public const ICON_PDF = 'far fa-file-pdf';
    public const ICON_FILE = 'far fa-file';

    /** @var string */
    protected $iconClass;
    /** @var string */
    protected $fileExtension;
    /** @var string */
    protected $mimeType;

    /**
     * @param string $mimeType
     * @param string $fileName
     */
    public function getIconClass($mimeType, $fileName): string
    {
        $this->iconClass = self::ICON_FILE;
        $filenameParts = explode('.', $fileName);
        $this->fileExtension = array_pop($filenameParts);
        $this->mimeType = $mimeType;

        $this->checkExcel();
        $this->checkPowerpoint();
        $this->checkWord();
        $this->checkPDF();

        return $this->iconClass;
    }

    /**
     * Check if file is an Excel file and if so, set the icon class.
     */
    protected function checkExcel(): void
    {
        if ('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' === $this->mimeType ||
            'application/vnd.openxmlformats-officedocument.spreadsheetml.template' === $this->mimeType ||
            'application/vnd.ms-excel' === $this->mimeType ||
            'xls' === $this->fileExtension ||
            'xlsx' === $this->fileExtension
        ) {
            $this->iconClass = self::ICON_EXCEL;
        }
    }

    /**
     * Check if file is an Powerpoint file and if so, set the icon class.
     */
    protected function checkPowerpoint(): void
    {
        if ('application/vnd.openxmlformats-officedocument.presentationml.presentation' === $this->mimeType ||
            'application/vnd.openxmlformats-officedocument.presentationml.slideshow' === $this->mimeType ||
            'application/vnd.ms-powerpoint' === $this->mimeType ||
            'ppt' === $this->fileExtension ||
            'pptx' === $this->fileExtension
        ) {
            $this->iconClass = self::ICON_POWERPOINT;
        }
    }

    /**
     * Check if file is an Word file and if so, set the icon class.
     */
    protected function checkWord(): void
    {
        if ('application/vnd.openxmlformats-officedocument.wordprocessingml.document' === $this->mimeType ||
            'application/vnd.openxmlformats-officedocument.wordprocessingml.template' === $this->mimeType ||
            'application/vnd.ms-word' === $this->mimeType ||
            'doc' === $this->fileExtension ||
            'docx' === $this->fileExtension
        ) {
            $this->iconClass = self::ICON_WORD;
        }
    }

    /**
     * Check if file is an PDF file and if so, set the icon class.
     */
    protected function checkPDF(): void
    {
        if ('application/pdf' === $this->mimeType ||
            'pdf' === $this->fileExtension
        ) {
            $this->iconClass = self::ICON_PDF;
        }
    }
}
