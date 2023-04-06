<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sourse;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.index', [
            'sourcesList' => $sourcesQueryBuilder->getAllWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $source = new Sourse($request->except('_token'));

        if ($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success', 'Источник успешно добавлен');
        }

        return \back()->with('error', 'Не удалось добавить источник');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sourse $source): View
    {
        return \view('admin.sources.edit', [
            'source' => $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sourse $source): RedirectResponse
    {
        $source = $source->fill($request->except('_token'));

        if ($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success', 'Источник успешно обновлён');
        }

        return \back()->with('error', 'Не удалось обновить источник');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sourse $source
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Sourse $source): JsonResponse
    {
        try {
            $source->delete();
            return \response()->json('ok');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', '400');
        }
    }
}
