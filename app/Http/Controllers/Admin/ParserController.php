<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ParserController extends Controller
{
    /**
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke(SourcesQueryBuilder $sourcesQueryBuilder): Application|RedirectResponse|Redirector
    {
        $sources = $sourcesQueryBuilder->getAll();

        foreach ($sources as $source) {
            \dispatch(new JobNewsParsing($source->url));
        }

        return \redirect(route('admin.index'));
    }
}
