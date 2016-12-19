<?php namespace Daviesgeek\EmojiPlugin;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Emojione\Emojione;
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
                function ($string) {
                    return Emojione::shortnameToImage(':' . str_replace(':', '', $string) . ':');
                },
                [
                    'is_safe' => ['html'],
                ]
            ),
        ];
    }
}
