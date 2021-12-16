<?php

declare(strict_types=1);

namespace Gubler\Twig\Extension;

use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashMessagesExtension extends AbstractExtension
{
    public const FLASH_MESSAGE_SUCCESS_CLASS = 'alert-success';
    public const FLASH_MESSAGE_ERROR_CLASS = 'alert-danger';
    public const FLASH_MESSAGE_WARNING_CLASS = 'alert-warning';
    public const FLASH_MESSAGE_NOTICE_CLASS = 'alert-info';
    public const FLASH_MESSAGE_TYPES = [
        'success' => self::FLASH_MESSAGE_SUCCESS_CLASS,
        'error' => self::FLASH_MESSAGE_ERROR_CLASS,
        'warning' => self::FLASH_MESSAGE_WARNING_CLASS,
        'notice' => self::FLASH_MESSAGE_NOTICE_CLASS,
    ];

    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'flashMessages',
                [$this, 'renderFlashMessages'],
                [
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }

    public function renderFlashMessages(Session $session): string
    {
        $flashes = $session->getFlashBag()->all();

        $return = '';

        foreach ($flashes as $type => $messages) {
            $return .= $this->renderMessages($type, $messages);
        }

        return $return;
    }

    /**
     * @param array<int, string> $messages
     */
    public function renderMessages(string $type, array $messages): string
    {
        $return = '';
        foreach ($messages as $message) {
            $return .= "\n<div class=\"alert " . self::FLASH_MESSAGE_TYPES[$type] . "\" role=\"alert\">";
            $return .= $message;
            $return .= "</div>\n";
        }

        return $return;
    }
}
