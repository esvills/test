<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Link;
use App\Services\GameService;

class GameController extends Controller
{
    /**
     * @param \App\Services\GameService $service
     * @param $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(GameService $service, string $link)
    {
        $service->setLink($link);
        $service->saveModel();

        return view('game.index', [
            'isWin'  => $service->isWin(),
            'link'   => $link,
            'winSum' => $service->getWinSum(),
        ]);
    }

    /**
     * @param $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history(string $link)
    {
        $linkModel = Link::where('link', $link)->first();
        $gameHistory = Game::where('link_id', $linkModel->id)->orderByDesc('id')->limit(3)->get();

        return view('game.history', [
            'link'  => $link,
            'items' => $gameHistory,
        ]);
    }
}
