<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\IParser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, IParser $parser)
    {
        $data = $parser
            ->setLink('https://www.cnews.ru/inc/rss/news_top.xml')
            ->getParseData();

        $parser->store($data);
    }
}
