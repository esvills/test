<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Link;

class GameService
{
    const MIN_NUMBER = 1;

    const MAX_NUMBER = 1000;

    protected $number;

    protected $link;

    /**
     * GameService constructor.
     */
    public function __construct()
    {
        $this->number = $this->generateNumber();
    }

    /**
     *
     */
    public function saveModel()
    {
        $linkModel = Link::where('link', $this->link)->first();

        Game::create([
            'user_id'    => optional($linkModel)->user_id,
            'link_id'    => optional($linkModel)->id,
            'win'        => $this->isWin(),
            'win_number' => $this->getNumber(),
            'win_sum'    => $this->getWinSum(),
        ]);
    }

    /**
     * @return int
     */
    protected function generateNumber(): int
    {
        return rand(self::MIN_NUMBER, self::MAX_NUMBER);
    }

    /**
     * @return bool
     */
    public function isWin(): bool
    {
        return $this->number % 2 === 0;
    }

    /**
     * @return false|float
     */
    public function getWinSum()
    {
        $percent = 0.1;

        if ($this->number > 900) {
            $percent = 0.7;
        } elseif ($this->number > 600) {
            $percent = 0.5;
        } elseif ($this->number > 300) {
            $percent = 0.3;
        }

        return round($this->number * $percent);
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }
}
