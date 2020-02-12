<?php

declare(strict_types=1);

namespace App\Twig;

use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FlashMessagesExtension extends AbstractExtension
{
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
        if (! ($session instanceof Session)) {
            return '';
        }

        $flashes = $session->getFlashBag()->all();

        $return = '';

        foreach ($flashes as $type => $messages) {
            $return .= $this->{'render'.ucwords($type).'Messages'}($messages);
        }

        return $return;
    }

    /**
     * @param array $messages
     */
    public function renderSuccessMessages($messages): string
    {
        $return = '';
        foreach ($messages as $message) {
            $return .= "\n<div class=\"alert alert-success\">";
            $return .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            $return .= $message;
            $return .= "</div>\n";
        }

        return $return;
    }

    /**
     * @param array $messages
     */
    public function renderErrorMessages($messages): string
    {
        $return = '';
        foreach ($messages as $message) {
            $return .= "\n<div class=\"alert alert-danger\">";
            $return .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            $return .= $message;
            $return .= "</div>\n";
        }

        return $return;
    }

    /**
     * @param array $messages
     */
    public function renderWarningMessages($messages): string
    {
        $return = '';
        foreach ($messages as $message) {
            $return .= "\n<div class=\"alert alert-warning\">";
            $return .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            $return .= $message;
            $return .= "</div>\n";
        }

        return $return;
    }

    /**
     * Render notice messages.
     *
     * @param array $messages
     */
    public function renderNoticeMessages($messages): string
    {
        $return = '';
        foreach ($messages as $message) {
            $return .= "\n<div class=\"alert alert-info\">";
            $return .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            $return .= $message;
            $return .= "</div>\n";
        }

        return $return;
    }
}
