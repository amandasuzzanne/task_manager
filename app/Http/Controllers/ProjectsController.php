<?php
/*
 * Rose Business Suite - Accounting, CRM and POS Software
 * Copyright (c) UltimateKode.com. All Rights Reserved
 * ***********************************************************************
 *
 *  Email: support@ultimatekode.com
 *  Website: https://www.ultimatekode.com
 *
 *  ************************************************************************
 *  * This software is furnished under a license and may be used and copied
 *  * only  in  accordance  with  the  terms  of such  license and with the
 *  * inclusion of the above copyright notice.
 *  * If you Purchased from Codecanyon, Please read the full License from
 *  * here- http://codecanyon.net/licenses/standard/
 * ***********************************************************************
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Access\User\User;
use App\Models\leave\Leave;
use App\Models\leave_category\LeaveCategory;
use App\Repositories\Focus\leave\LeaveRepository;
use DB;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return new ViewResponse('focus.leave.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('focus.leave.create', compact('leave_categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(Request $request)
    {
        // $this->repository->create($request->except('_token'));

        // return new RedirectResponse(route('biller.leave.index'), ['flash_success' => 'Leave Created Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Leave $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        // $leave_categories = LeaveCategory::get(['id', 'title', 'qty']);
        // $users = User::get(['id', 'first_name', 'last_name']);

        // return view('focus.leave.edit', compact('leave', 'leave_categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Leave $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        // $this->repository->update($leave, $request->except('_token'));

        // return new RedirectResponse(route('biller.leave.index'), ['flash_success' => 'Leave Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Leave $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        // $this->repository->delete($leave);

        // return new RedirectResponse(route('biller.leave.index'), ['flash_success' => 'Leave Deleted Successfully']);
    }


    /**
     * Display the specified resource.
     *
     * @param  Leave $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        // return view('focus.leave.view', compact('leave'));
    }
}
