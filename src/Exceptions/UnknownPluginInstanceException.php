<?php

/**
 * This file is part of the "Laravel-Lang/Locales" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2022 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/Laravel-Lang/Locales
 */

declare(strict_types=1);

namespace LaravelLang\Locales\Exceptions;

use LaravelLang\Locales\Plugins\Plugin;

class UnknownPluginInstanceException extends BaseException
{
    public function __construct(string $plugin)
    {
        parent::__construct($this->message($plugin));
    }

    protected function message(string $plugin): string
    {
        return sprintf('The %s class is not a %s instance.', $plugin, Plugin::class);
    }
}
