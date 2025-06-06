<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Works;
use Illuminate\Support\Facades\Auth;

class WorksController extends Controller
{
    public function index(Request $request)
    {
        $content = Settings::where('vendor_id', Auth::user()->id)->first();
        $allworkcontent = Works::where('vendor_id', Auth::user()->id)->orderBy('reorder_id')->get();
        return view('admin.how_work.index', compact('content', 'allworkcontent'));
    }
    public function savecontent(Request $request)
    {
        $newcontent = Settings::where('vendor_id', Auth::user()->id)->first();
        $newcontent->work_title = $request->title;
        $newcontent->work_subtitle = $request->subtitle;
        $newcontent->save();
        return redirect('admin/how_works')->with('success', trans('messages.success'));
    }
    public function add()
    {
        return view('admin.how_work.add');
    }
    public function save(Request $request)
    {
        $newwork = new Works();
        $newwork->vendor_id = Auth::user()->id;
        $newwork->title = $request->title;
        $newwork->sub_title = $request->subtitle;
        if ($request->has('image')) {
            $reimage = 'work-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app\public\landing\images\png'), $reimage);
            $newwork->image = $reimage;
        }
        $newwork->save();
        return redirect('admin/how_works')->with('success', trans('messages.success'));
    }
    public function edit(Request $request)
    {
        $editwork = Works::where('id', $request->id)->where('vendor_id', Auth::user()->id)->first();
        return view('admin.how_work.edit', compact('editwork'));
    }
    public function update(Request $request)
    {
        $editwork = Works::where('id', $request->id)->where('vendor_id', Auth::user()->id)->first();
        $editwork->title = $request->title;
        $editwork->sub_title = $request->subtitle;
        if ($request->has('image')) {

            if (file_exists(storage_path('app/public/landing/images/png/' . $editwork->image))) {
                unlink(storage_path('app/public/landing/images/png/' . $editwork->image));
            }
            $reimage = 'work-' . uniqid() . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/landing/images/png/'), $reimage);
            $editwork->image = $reimage;
        }
        $editwork->update();
        return redirect('admin/how_works')->with('success', trans('messages.success'));
    }
    public function delete(Request $request)
    {
        $deletework = Works::where('id', $request->id)->where('vendor_id', Auth::user()->id)->first();
        if (file_exists(storage_path('app/public/landing/images/png/' . $deletework->image))) {
            unlink(storage_path('app/public/landing/images/png/' . $deletework->image));
        }
        $deletework->delete();
        return redirect('admin/how_works')->with('success', trans('messages.success'));
    }

    public function reorder_status(Request $request)
    {
        $vendor_id = Auth::user()->id;
        $getstatus = Works::where('vendor_id', $vendor_id)->get();
        foreach ($getstatus as $status) {
            foreach ($request->order as $order) {
                $status = Works::where('id', $order['id'])->first();
                $status->reorder_id = $order['position'];
                $status->save();
            }
        }
        return response()->json(['status' => 1, 'msg' => trans('messages.success')], 200);
    }
}
