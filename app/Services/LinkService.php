<?php

namespace App\Services;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Str;

class LinkService
{
    const VALIDATED_DATE = 7;

    public static function generate(User $user)
    {
        return Link::create([
            'user_id'    => $user->id,
            'link'       => Str::random(16),
            'created_at' => now(),
            'active'     => Link::ACTIVE,
        ]);
    }

    public static function check(string $link)
    {
        $link = Link::where('link', $link)->active()->firstOrfail();

        $linkDate = $link->created_at->addDay(self::VALIDATED_DATE);
        $now = now();

        if ($now->gt($linkDate)) {
            abort(404);
        }
    }

    public static function copy(string $link)
    {
        $link = Link::where('link', $link)->firstOrfail();

        $newLink = $link->replicate();
        $newLink->link = Str::random(16);
        $newLink->created_at = now();
        $newLink->save();

        return $newLink;
    }

    public static function deactivated(string $link)
    {
        $link = Link::where('link', $link)->firstOrfail();

        $link->active = 0;
        $link->save();

        return redirect(route('home'));
    }
}
