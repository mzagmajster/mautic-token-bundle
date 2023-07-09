<?php

namespace MauticPlugin\MZagmajsterTokenBundle\EventListener;

use Mautic\CoreBundle\Event\TokenReplacementEvent;
use Mautic\EmailBundle\EmailEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EmailSubscriber implements EventSubscriberInterface
{
    public function __construct()
    {
    }

    public static function getSubscribedEvents()
    {
        return [
            EmailEvents::TOKEN_REPLACEMENT => [
                ['replaceTokenIbanMasked', 0],
            ],
        ];
    }

    public function replaceTokenIbanMasked(TokenReplacementEvent $event)
    {
        $event->addToken('{ibanmasked}', '');

        $lead = $event->getLead();
        if (null === $lead) {
            return;
        }

        if (!isset($lead['iban'])) {
            return;
        }

        if ('' === $lead['iban'] || null === $lead['iban']) {
            return;
        }

        // Lets replace the value.
        $ibanMasked = '*'.substr($lead['iban'], -3);
        $event->addToken('{ibanmasked}', $ibanMasked);
    }
}
