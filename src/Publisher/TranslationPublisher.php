<?php


declare(strict_types=1);

/*
 * This file is part of Laravel Service Provider.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\ServiceProvider\Publisher;

use InvalidArgumentException;

class TranslationPublisher extends Publisher
{
    protected function getSource($packagePath): array
    {
        $sources = [
            "{$packagePath}/resources/lang",
            "{$packagePath}/lang",
        ];

        foreach ($sources as $source) {
            if ($this->files->isDirectory($source)) {
                return [$source => $this->publishPath.'/'.$this->packageName];
            }
        }

        throw new InvalidArgumentException('Translations not found.');
    }
}
