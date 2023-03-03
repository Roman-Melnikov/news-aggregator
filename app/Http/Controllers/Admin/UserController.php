<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersQueryBuilder $usersQueryBuilder): View
    {
        return \view('admin.users.index', [
            'users' => $usersQueryBuilder->getUsersWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user): View
    {
        return \view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user->is_admin = (int)$request->validated()['is_admin'];

        if ($user->save()) {
            return \redirect()->route('admin.users.index')->with('success', __('messages.admin.users.success'));
        }

        return \back('error', __('messages.admin.users.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();

            return \response()->json('ok');
        } catch(\Exception $exception){
            Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', '400');
        }

    }
}
