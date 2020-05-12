<?php

namespace App\Http\Controllers;

use App\Services\LinkService;

class LinkController extends Controller
{
    /**
     * @param string $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(string $link)
    {
        return view('link.index', [
            'link' => $link,
        ]);
    }

    /**
     * @param $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deactivated($link)
    {
        return LinkService::deactivated($link);
    }

    /**
     * @param $link
     * @return \Illuminate\Http\RedirectResponse
     */
    public function new($link)
    {
        $newLink = LinkService::copy($link);

        return redirect()->route('link', $newLink->link);
    }
}
