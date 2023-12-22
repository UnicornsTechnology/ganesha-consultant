<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_improt_data;
use App\Models\WhatsAppTemplates;
use Illuminate\Http\Request;

class WhatsAppTemplatesController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:/admin/whatsapp-templates', ['only' => ['index']]);
    //     $this->middleware('permission:/admin/whatsapp-template/create', ['only' => ['create']]);
    //     $this->middleware('permission:/admin/whatsapp-template/edit/{id}', ['only' => ['edit']]);
    //     $this->middleware('permission:/admin/whatsapp-template/move-to-trash/{id}', ['only' => ['makeTrashed']]);
    //     $this->middleware('permission:/admin/whatsapp-template/restore-from-trash/{id}', ['only' => ['removeFromTrashed']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whatsAppTemplates = WhatsAppTemplates::latest()->where('wt_is_active', 'active')->paginate(10);
        $whatsAppTemplatesTrashed = WhatsAppTemplates::latest()->where('wt_is_active', 'inActive')->paginate(10);
        return response()->view('back.admin.whatsapp_api.templates.index', compact('whatsAppTemplates', 'whatsAppTemplatesTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('back.admin.whatsapp_api.templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whatsAppTemplates = new WhatsAppTemplates();
        $whatsAppTemplates->wt_template_name = $request->input('whatsapp_template_name');
        $whatsAppTemplates->wt_image_url = $request->input('whatsapp_template_image_url');
        $whatsAppTemplates->wt_template_language = $request->input('whatsapp_template_language');
        $whatsAppTemplates->wt_file_name = $request->input('whatsapp_template_filename');
        $whatsAppTemplates->save();
        return redirect('/admin/whatsapp/templates')->with('msg', 'WhatsApp template created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhatsAppTemplates  $whatsAppTemplates
     * @return \Illuminate\Http\Response
     */
    public function show(WhatsAppTemplates $whatsAppTemplates)
    {
        return response()->view('back.admin.whatsapp_api.templates.show', compact('whatsAppTemplates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhatsAppTemplates  $whatsAppTemplates
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $whatsAppTemplates = WhatsAppTemplates::find($id);
        return response()->view('back.admin.whatsapp_api.templates.edit', compact('whatsAppTemplates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhatsAppTemplates  $whatsAppTemplates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $whatsAppTemplates = WhatsAppTemplates::find($request->wt_id);
        $whatsAppTemplates->wt_template_name = $request->input('whatsapp_template_name');
        $whatsAppTemplates->wt_image_url = $request->input('whatsapp_template_image_url');
        $whatsAppTemplates->wt_template_language = $request->input('whatsapp_template_language');
        $whatsAppTemplates->wt_file_name = $request->input('whatsapp_template_filename');
        $whatsAppTemplates->save();

        return redirect('/admin/whatsapp/templates')->with('msg', 'WhatsApp template updated successfully!');
    }

    public function makeTrashed($id)
    {
        $whatsAppTemplates = WhatsAppTemplates::find($id);
        $whatsAppTemplates->wt_is_active = "inActive";
        $whatsAppTemplates->save();
        return redirect('/admin/whatsapp-templates')->with('msg', 'WhatsApp template moved into the trash !');
    }
    public function removeFromTrashed($id)
    {
        $whatsAppTemplates = WhatsAppTemplates::find($id);
        $whatsAppTemplates->wt_is_active = "active";
        $whatsAppTemplates->save();
        return redirect('/admin/whatsapp-templates')->with('msg', 'WhatsApp template restored successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhatsAppTemplates  $whatsAppTemplates
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatsAppTemplates $whatsAppTemplates)
    {
        $whatsAppTemplates->delete();
        return redirect('/admin/whatsapp-templates')->with('msg', 'WhatsApp template deleted successfully!');
    }

    // SENDING WHATSAPP MESSAGES
    public function sendMessages(){
        $users = tbl_improt_data::paginate(100);
        $templates = WhatsAppTemplates::where('wt_is_active','active')->get();
        return view("back.admin.whatsapp_api.send_messages.index",compact('users','templates'));
    }
}
