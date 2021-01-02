<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PageSetting;
use App\Models\Industry;
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
        // $industryList = $this->getIndustry();
        $adminDetails = AdminController::getAdminDetails();
        return view('layouts.admin.pagesettings', compact('pageSettings', 'adminDetails'));
    }

    protected function getPageSettings()
    {
        $pageSettings = PageSetting::get()->first();
        return $pageSettings;
    }


    public function industryList()
    {
        $industryList = Industry::get();

        return Datatables::of($industryList)
            ->addColumn('action', function ($industryList) {
                
                $action =
                    '<button type="button"  class="btn btn-danger m-2 delete-indsutry-button"  id="' . $industryList->id . '"> Delete</a>';
                $action .= '<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }



    


    public function addNewIndustry(Request $request)
    {
        $request = $_POST['industry_name'];
        
        $newIndustry = Industry::insert([
                'industry_name' => $request,
            ]);
        return $newIndustry;
    }

     public function removeIndustry()
    {
        $data = $_POST['delete_id'];
        Industry::where('id', $data)->delete();
        // UserData::where('user_id', $data)->delete();
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
        if (is_null($pageSettings)) {
            if ($request->hasFile('home_image')) {
                $home_image = $request->file('home_image');
                $filename = time() . '.' . $home_image->getClientOriginalExtension();
                $home_image->storeAs('img/homepage', $filename, 'page_image');
                $data = PageSetting::create([
                    'home_image' => $filename,
                ]);
            }
            PageSetting::where('id', $data->id)
                ->update([
                    'home_description' => $request->home_description,
                    'fb_link' => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'instragram_link' => $request->instragram_link,
                ]);
        } else {

            if ($request->hasFile('home_image')) {
                $home_image = $request->file('home_image');
                $filename = time() . '.' . $home_image->getClientOriginalExtension();
                $home_image->storeAs('img/homepage/', $filename, 'page_image');
                if (!empty($pageSettings->home_image)) {
                    $image_path = public_path() . '/img/homepage/' . $pageSettings->home_image;
                    unlink($image_path);
                }
                PageSetting::where('id', $pageSettings->id)
                    ->update([
                        'home_image' => $filename,
                    ]);
            }
            PageSetting::where('id', $pageSettings->id)
                ->update([
                    'home_description' => $request->home_description,
                    'fb_link' => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'instragram_link' => $request->instragram_link,
                ]);
        }
        return redirect()->back()->with('success', 'Settings Updated Successfully');
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
