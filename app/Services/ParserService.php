<?php

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\IParser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Foundation\Application;

class ParserService implements IParser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XmlParser::load($this->link);

        return $xml->parse(
            [
                'title' => [
                    'uses' => 'channel.title'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'item' => [
                    'uses' => 'channel.item[guid,link,title,pubDate,description,author,category,]'
                ],
            ]
        );
    }

    public function store(array $parseData): Application|RedirectResponse|Redirector
    {
        foreach ($parseData['item'] as $item) {
            $news = new News([
                'title' => $item['title'],
                'author' => $parseData['title'],
                'status' => 'active',
                'description' => $item['description'],
                'created_at' => $item['pubDate'],
            ]);

            $news->save();
        }
        return \redirect()->route('news.index');
    }
}
