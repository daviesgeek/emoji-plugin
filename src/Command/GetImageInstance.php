<?php namespace Daviesgeek\EmojiPlugin\Command;

use Anomaly\Streams\Platform\Image\Image;
use Emojione\Client;
use Emojione\Ruleset;

class GetImageInstance
{

    /**
     * The emoji shortcode.
     *
     * @var string
     */
    protected $shortname;

    /**
     * The output format.
     *
     * @var string
     */
    protected $format;

    /**
     * Create a new GetImageInstance instance.
     *
     * @param string $shortname
     * @param string $format
     */
    public function __construct($shortname, $format = 'svg')
    {
        $this->shortname = $shortname;
        $this->format    = strtolower($format);
    }

    /**
     * Handle the command.
     *
     * @param Image   $image
     * @param Ruleset $rules
     * @param Client  $client
     * @return null
     */
    public function handle(Image $image, Ruleset $rules, Client $client)
    {
        if (!$unicode = array_get($rules->getShortcodeReplace(), $this->shortname)) {
            return null;
        }

        return $image->make(
            $client->{'imagePath' . strtoupper($this->format)} . $unicode . '.' . $this->format,
            'image'
        );
    }
}
