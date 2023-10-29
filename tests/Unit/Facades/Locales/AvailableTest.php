<?php

/**
 * This file is part of the "laravel-Lang/locales" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Laravel Lang Team
 * @license MIT
 *
 * @see https://laravel-lang.com
 */

declare(strict_types=1);

use LaravelLang\Locales\Enums\Locale;
use LaravelLang\Locales\Facades\Locales;

it('checks the list of available locales')
    ->expect(Locales::available())
    ->toBeArray()
    ->toBeIn([Locale::English->value])
    ->not->toBeIn(['foo', 'bar']);

it('checks the list of available locales taking into account aliases', function (Locale $locale, string $alias) {
    setAlias($locale, $alias);

    expect(Locales::available())
        ->toBeArray()
        ->toBeIn([$alias])
        ->not->toBeIn([$locale->value]);
})->with('aliased-locales');

it('checks incorrect locales against the list of available ones', function (?string $locale) {
    expect(Locales::available())->toBeArray()->not->toBeIn([$locale]);
})->with('incorrect-locales');