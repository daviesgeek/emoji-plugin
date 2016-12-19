<?php namespace Daviesgeek\EmojiPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Daviesgeek\EmojiPlugin\Command\GetImageInstance;
use Twig_SimpleFunction;

class EmojiPlugin extends Plugin
{

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction(
                'emoji',
                function ($shortname, $format = 'svg') {
                    return $this->dispatch(new GetImageInstance(':' . str_replace(':', '', $shortname) . ':', $format));
                },
                [
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }
}
