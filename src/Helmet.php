<?php

declare(strict_types=1);

namespace HtmlCreator;

use HtmlCreator\Helmet\AppleTouchIcon;
use HtmlCreator\Helmet\AppleTouchPrecomposedIcon;
use HtmlCreator\Helmet\Icon;
use HtmlCreator\Helmet\OgImage;

class Helmet implements HelmetInterface
{
    public function __construct(
        private string $title,
        private string $description,
        private string $url,
        private string $modifiedTime,
        private string $pageUrl,
        private string $themeColor,
        private string $image,
        private string $msapplicationTileImage,
        private string $sitemap,
        private string $manifest,
        private string $favicon,
        private string $ogImages,
        private string $icons,
        private string $appleTouchIcons,
        private string $appleTouchPrecomposedIcons,
    ) {
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            (string) $data['title'] ??= '',
            (string) $data['description'] ??= '',
            (string) $data['url'] ??= '',
            (string) $data['modifiedTime'] ??= '',
            (string) $data['pageUrl'] ??= '',
            (string) $data['themeColor'] ??= '#ffffff',
            (string) $data['image'] ??= '',
            (string) $data['msapplicationTileImage'] ??= '',
            (string) $data['sitemap'] ??= '',
            (string) $data['manifest'] ??= '',
            (string) $data['favicon'] ??= '',
            (string) new ItemsFactory($data['ogImages'] ??= [], OgImage::class),
            (string) new ItemsFactory($data['icons'] ??= [], Icon::class),
            (string) new ItemsFactory($data['appleTouchIcons'] ??= [], AppleTouchIcon::class),
            (string) new ItemsFactory($data['appleTouchPrecomposedIcons'] ??= [], AppleTouchPrecomposedIcon::class),
        );
    }

    public function getHtml(): string
    {
        return <<<HTML
            <title>$this->title</title>
            <link rel="sitemap" type="application/xml" href="$this->sitemap" data-react-helmet="true">
            <link rel="shortcut icon" href="$this->favicon" type="image/x-icon" data-react-helmet="true">
            <link rel="manifest" href="$this->manifest" data-react-helmet="true">
            $this->icons
            $this->appleTouchIcons
            $this->appleTouchPrecomposedIcons
            <meta charset="utf-8" data-react-helmet="true">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" data-react-helmet="true">
            <meta name="theme-color" content="$this->themeColor" data-react-helmet="true">
            <meta name="description" content="$this->description" data-react-helmet="true">
            <meta property="article:modified_time" content="$this->modifiedTime" data-react-helmet="true">
            <meta name="author" content="Grzegorz Jamróz" data-react-helmet="true">
            <meta property="og:title" content="$this->title" data-react-helmet="true">
            <meta property="og:type" content="website" data-react-helmet="true">
            <meta property="og:url" content="$this->url" data-react-helmet="true">
            <meta property="og:site_name" content="$this->title" data-react-helmet="true">
            <meta property="og:description" content="$this->description" data-react-helmet="true">
            <meta property="og:image:type" content="image/png" data-react-helmet="true">
            $this->ogImages
            <meta name="twitter:card" content="summary" data-react-helmet="true">
            <meta name="twitter:title" content="$this->title" data-react-helmet="true">
            <meta name="twitter:description" content="$this->description" data-react-helmet="true">
            <meta name="twitter:image" content="$this->image" data-react-helmet="true">
            <meta name="msapplication-TileColor" content="$this->themeColor" data-react-helmet="true">
            <meta name="msapplication-TileImage" content="$this->msapplicationTileImage" data-react-helmet="true">
        HTML;
    }

    public function __toString()
    {
        return $this->getHtml();
    }
}
