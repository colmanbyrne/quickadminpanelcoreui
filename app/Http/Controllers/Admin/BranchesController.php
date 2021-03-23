<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBranchRequest;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branches = Branch::with(['branch_secretary', 'branch_treasurer', 'branch_chair', 'branch_rep_1', 'branch_rep_2'])->get();

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch_secretaries = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_treasurers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_chairs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_rep_1s = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_rep_2s = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.branches.create', compact('branch_secretaries', 'branch_treasurers', 'branch_chairs', 'branch_rep_1s', 'branch_rep_2s'));
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = Branch::create($request->all());

        return redirect()->route('admin.branches.index');
    }

    public function edit(Branch $branch)
    {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch_secretaries = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_treasurers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_chairs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_rep_1s = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch_rep_2s = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branch->load('branch_secretary', 'branch_treasurer', 'branch_chair', 'branch_rep_1', 'branch_rep_2');

        return view('admin.branches.edit', compact('branch_secretaries', 'branch_treasurers', 'branch_chairs', 'branch_rep_1s', 'branch_rep_2s', 'branch'));
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('admin.branches.index');
    }

    public function show(Branch $branch)
    {
        abort_if(Gate::denies('branch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->load('branch_secretary', 'branch_treasurer', 'branch_chair', 'branch_rep_1', 'branch_rep_2', 'branchMembers');

        return view('admin.branches.show', compact('branch'));
    }

    public function destroy(Branch $branch)
    {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $branch->delete();

        return back();
    }

    public function massDestroy(MassDestroyBranchRequest $request)
    {
        Branch::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
