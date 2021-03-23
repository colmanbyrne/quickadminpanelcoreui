<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Branch;
use App\Models\Member;
use App\Models\MembershipCategory;
use App\Models\MembershipStatus;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MembersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Member::with(['member_username', 'membership_category', 'member_role', 'branches', 'mem_status', 'created_by'])->select(sprintf('%s.*', (new Member)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'member_show';
                $editGate      = 'member_edit';
                $deleteGate    = 'member_delete';
                $crudRoutePart = 'members';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('member_username_email', function ($row) {
                return $row->member_username ? $row->member_username->email : '';
            });

            $table->editColumn('member_username.name', function ($row) {
                return $row->member_username ? (is_string($row->member_username) ? $row->member_username : $row->member_username->name) : '';
            });
            $table->editColumn('member_no', function ($row) {
                return $row->member_no ? $row->member_no : "";
            });
            $table->addColumn('membership_category_category_type', function ($row) {
                return $row->membership_category ? $row->membership_category->category_type : '';
            });

            $table->editColumn('membership_category.category_name', function ($row) {
                return $row->membership_category ? (is_string($row->membership_category) ? $row->membership_category : $row->membership_category->category_name) : '';
            });
            $table->editColumn('surname', function ($row) {
                return $row->surname ? $row->surname : "";
            });
            $table->editColumn('firstname', function ($row) {
                return $row->firstname ? $row->firstname : "";
            });
            $table->editColumn('prefix', function ($row) {
                return $row->prefix ? $row->prefix : "";
            });
            $table->editColumn('partner', function ($row) {
                return $row->partner ? $row->partner : "";
            });
            $table->editColumn('organisation_name', function ($row) {
                return $row->organisation_name ? $row->organisation_name : "";
            });
            $table->editColumn('address_1', function ($row) {
                return $row->address_1 ? $row->address_1 : "";
            });
            $table->editColumn('address_2', function ($row) {
                return $row->address_2 ? $row->address_2 : "";
            });
            $table->editColumn('town', function ($row) {
                return $row->town ? $row->town : "";
            });
            $table->editColumn('county', function ($row) {
                return $row->county ? $row->county : "";
            });
            $table->editColumn('post_code', function ($row) {
                return $row->post_code ? $row->post_code : "";
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : "";
            });
            $table->editColumn('tel_no', function ($row) {
                return $row->tel_no ? $row->tel_no : "";
            });
            $table->editColumn('mob_no', function ($row) {
                return $row->mob_no ? $row->mob_no : "";
            });
            $table->editColumn('email_2', function ($row) {
                return $row->email_2 ? $row->email_2 : "";
            });
            $table->editColumn('email_status', function ($row) {
                return $row->email_status ? $row->email_status : "";
            });
            $table->editColumn('sms_status', function ($row) {
                return $row->sms_status ? $row->sms_status : "";
            });
            $table->editColumn('mem_year', function ($row) {
                return $row->mem_year ? $row->mem_year : "";
            });
            $table->editColumn('mem_fee', function ($row) {
                return $row->mem_fee ? $row->mem_fee : "";
            });
            $table->editColumn('mem_fee_currency', function ($row) {
                return $row->mem_fee_currency ? $row->mem_fee_currency : "";
            });
            $table->editColumn('pay_method', function ($row) {
                return $row->pay_method ? $row->pay_method : "";
            });

            $table->editColumn('date_cancelled', function ($row) {
                return $row->date_cancelled ? $row->date_cancelled : "";
            });
            $table->editColumn('mem_notes', function ($row) {
                return $row->mem_notes ? $row->mem_notes : "";
            });
            $table->addColumn('member_role_title', function ($row) {
                return $row->member_role ? $row->member_role->title : '';
            });

            $table->editColumn('branch', function ($row) {
                $labels = [];

                foreach ($row->branches as $branch) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $branch->shortname);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('updated_by', function ($row) {
                return $row->updated_by ? $row->updated_by : "";
            });
            $table->addColumn('mem_status_statusname', function ($row) {
                return $row->mem_status ? $row->mem_status->statusname : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'member_username', 'membership_category', 'member_role', 'branch', 'mem_status']);

            return $table->make(true);
        }

        $users                 = User::get();
        $membership_categories = MembershipCategory::get();
        $roles                 = Role::get();
        $branches              = Branch::get();
        $membership_statuses   = MembershipStatus::get();

        return view('admin.members.index', compact('users', 'membership_categories', 'roles', 'branches', 'membership_statuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_usernames = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $membership_categories = MembershipCategory::all()->pluck('category_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branches = Branch::all()->pluck('shortname', 'id');

        $mem_statuses = MembershipStatus::all()->pluck('statusname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.members.create', compact('member_usernames', 'membership_categories', 'member_roles', 'branches', 'mem_statuses'));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());
        $member->branches()->sync($request->input('branches', []));

        return redirect()->route('admin.members.index');
    }

    public function edit(Member $member)
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member_usernames = User::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $membership_categories = MembershipCategory::all()->pluck('category_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member_roles = Role::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $branches = Branch::all()->pluck('shortname', 'id');

        $mem_statuses = MembershipStatus::all()->pluck('statusname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member->load('member_username', 'membership_category', 'member_role', 'branches', 'mem_status', 'created_by');

        return view('admin.members.edit', compact('member_usernames', 'membership_categories', 'member_roles', 'branches', 'mem_statuses', 'member'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());
        $member->branches()->sync($request->input('branches', []));

        return redirect()->route('admin.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->load('member_username', 'membership_category', 'member_role', 'branches', 'mem_status', 'created_by');

        return view('admin.members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberRequest $request)
    {
        Member::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
