<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2020 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace CoreShop\Component\Pimcore\Twig\Extension;

use Pimcore\Model\Asset\Image;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

final class ImageThumbnailExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('image_thumbnail', [$this, 'getImageThumbnail'], ['is_safe' => ['html']]),
            new TwigFilter('image_thumbnail_html', [$this, 'getImageThumbnailHtml'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('image_thumbnail', [$this, 'getImageThumbnail'], ['is_safe' => ['html']]),
            new TwigFunction('image_thumbnail_html', [$this, 'getImageThumbnailHtml'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param Image  $image
     * @param string $thumbnail
     * @param bool   $deferred
     *
     * @return Image\Thumbnail
     */
    public function getImageThumbnail(Image $image, string $thumbnail, bool $deferred = true): Image\Thumbnail
    {
        @trigger_error(
            'image_thumbnail 3.0.0 and will be removed in 3.1.0. Use pimcore_image_thumbnail instead.',
            E_USER_DEPRECATED
        );

        return $image->getThumbnail($thumbnail, $deferred);
    }

    /**
     * @param Image  $image
     * @param string $thumbnail
     * @param array  $options
     * @param bool   $deferred
     *
     * @return string
     */
    public function getImageThumbnailHtml(
        Image $image,
        string $thumbnail,
        array $options = [],
        bool $deferred = true
    ): string {
        @trigger_error(
        'image_thumbnail_html 3.0.0 and will be removed in 3.1.0. Use pimcore_image_thumbnail_html instead.',
        E_USER_DEPRECATED
        );

        return $this->getImageThumbnail($image, $thumbnail, $deferred)->getHtml($options);
    }
}
