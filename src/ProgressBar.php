<?php

namespace Signifly\ProgressBar;

use Laravel\Nova\Card;

class ProgressBar extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'progress-bar';
    }

    /**
     * Indicates that the progress chart should be a semicircle
     *
     * @return $this
     */
    public function type(string $type)
    {
        return $this->withMeta(['type' => $type]);
    }

    /**
     * percentage value sent along..
     *
     * @return $this
     */
    public function percentage(int $percentage)
    {
        return $this->withMeta(['percentage' => $percentage]);
    }

    /**
     * options to send along
     *
     * @return $this
     */
    public function options(array $options)
    {
        return $this->withMeta(['options' => $options]);
    }
}
