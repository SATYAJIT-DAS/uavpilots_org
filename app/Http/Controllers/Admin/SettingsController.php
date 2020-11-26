<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PageSetting;
use App\Http\Requests\UploadAdminProfile;
use App\Models\UserData;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\AdminController;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pageSettings = $this->getPageSettings();
        $adminDetails = AdminController::getAdminDetails();
        return view('layouts.admin.pagesettings', compact('pageSettings', 'adminDetails'));
    }

    protected function getPageSettings()
    {
        $pageSettings = PageSetting::get()->first();
        return $pageSettings;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePageSettings(Request $request)
    {   
        $pageSettings = PageSetting::get()->first();

        if ($request->hasFile('home_image')) {
            $home_image = $request->file('home_image');
            $filename = time() . '.' . $home_image->getClientOriginalExtension();
            $home_image->storeAs('img/', $filename,'page_image');
            PageSetting::where('id', $pageSettings->id)
                ->update([
                    'home_image' => $filename,
                ]);
        }


        PageSetting::where('id', $pageSettings->id)
            ->update([
                
                'fb_link' => $request->fb_link,
                'twitter_link' => $request->twitter_link,
                'instragram_link' => $request->instragram_link,
            ]);

        $pageSettings = PageSetting::get()->first();
        $adminDetails = AdminController::getAdminDetails();
        return view('layouts.admin.pagesettings', compact('pageSettings', 'adminDetails'));
    }


    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
