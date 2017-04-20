<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Request;
use Session;
use DateTime;
use Redirect;

use App\Page;
use App\User;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id()) {
            $user = User::find(Auth::id());
            if ($user->rights == 'admin') {
                $pages = Page::orderByDesc('id')
                    ->get();
            } else {
                $pages = Page::where('user_id', Auth::id())
                    ->orderBy('id', 'desc')
                    ->get();
            }
        }

        return View('pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page;
        $page_last_id = $page->create([
            'user_id' => Auth::id()
        ])->id;

        return Redirect::action(
            'PageController@edit', ['id' => $page_last_id]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("pages.show")
            ->with("page", Page::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.edit')
            ->with('page', Page::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $page->update([
            'company_name' => Request::get('company_name'),
            'description' => Request::get('description'),
            'phone' => Request::get('phone'),
            'email' => Request::get('email'),
            'address' => Request::get('address'),

            'offer' => Request::get('offer'),
            'bullets' => Request::get('bullets'),
            'video' => Request::get('video'),

            'lead_magnet' => Request::get('lead_magnet'),
            'call_to_action' => Request::get('call_to_action'),

            'name_form_enabled' => Request::get('name_form_enabled'),
            'email_form_enabled' => Request::get('email_form_enabled'),
            'phone_form_enabled' => Request::get('phone_form_enabled'),
            'comment_form_enabled' => Request::get('comment_form_enabled'),
            'money_button' => Request::get('money_button'),

            'legal_information' => Request::get('legal_information'),

            'case_enabled' => Request::get('case_enabled'),
            'case_title' => Request::get('case_title'),
            'case_video_1' => Request::get('case_video_1'),
            'case_text_1' => Request::get('case_text_1'),
            'case_video_2' => Request::get('case_video_2'),
            'case_text_2' => Request::get('case_text_2'),
            'case_video_3' => Request::get('case_video_3'),
            'case_text_3' => Request::get('case_text_3'),
            'case_video_4' => Request::get('case_video_4'),
            'case_text_4' => Request::get('case_text_4'),
            'case_video_5' => Request::get('case_video_5'),
            'case_text_5' => Request::get('case_text_5'),
            'case_video_6' => Request::get('case_video_6'),
            'case_text_6' => Request::get('case_text_6'),
            'case_video_7' => Request::get('case_video_7'),
            'case_text_7' => Request::get('case_text_7'),
            'case_video_8' => Request::get('case_video_8'),
            'case_text_8' => Request::get('case_text_8'),
            'case_video_9' => Request::get('case_video_9'),
            'case_text_9' => Request::get('case_text_9'),

            'comments_enabled' => Request::get('comments_enabled'),

            'domain' => Request::get('domain'),
            'subdomain' => Request::get('subdomain'),
            'title' => Request::get('title'),
            'redirect' => Request::get('redirect'),

            'google' => Request::get('google'),
            'yandex' => Request::get('yandex'),
            'yandex_target_button' => Request::get('yandex_target_button'),

            'mailchimp_api_key' => Request::get('mailchimp_api_key'),
            'mailchimp_list_id' => Request::get('mailchimp_list_id')
        ]);

        if (Request::hasFile('background_image')) {
            $extension = Request::file('background_image')->getClientOriginalExtension();
            $upload_path = public_path('files/' . $page->id);
            $file_name = 'bg.' . $extension;
            Request::file('background_image')->move($upload_path, $file_name);

            $page->update([
                'background_image' => $file_name
            ]);
        }

        if (Request::hasFile('lead_magnet_file')) {
            $extension = Request::file('lead_magnet_file')->getClientOriginalExtension();

            $upload_path = public_path('files/' . $page->id);
            //$file_name = $now->format('Y-m-d-H-i-s') . '.' . $extension;
            $file_name = 'Document.' . $extension;
            Request::file('lead_magnet_file')->move($upload_path, $file_name);

            $page->update([
                'lead_magnet_file' => $file_name
            ]);
        }

        Session::flash('success', 'Страница отредактирована.');

        return Redirect::to("/pages");
    }

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

    public function updateajax(Request $request) {
        $page = Page::find(Request::get("id"));
        $page->update([
            Request::get("namei") => Request::get("valuei")
        ]);
        return Request::get("valuei");
    }

    public function updateajaximage(Request $request) {
        if (Request::hasFile('background_image')) {
            $page = Page::find(Request::get('id'));

            $now = new DateTime();
            $extension = Request::file('background_image')->getClientOriginalExtension();

            $upload_path = public_path('files/' . $page->id);
            //$file_name = $now->format('Y-m-d-H-i-s') . '.' . $extension;
            $file_name = 'bg.' . $extension;
            Request::file('background_image')->move($upload_path, $file_name);

            $page->update([
                'background_image' => $file_name
            ]);
            return 'success';
        }
    }

    public function updateajaxfile(Request $request) {
        if (Request::hasFile('lead_magnet_file')) {
            $page = Page::find(Request::get('id'));

            $now = new DateTime();
            $extension = Request::file('lead_magnet_file')->getClientOriginalExtension();

            $upload_path = public_path('files/' . $page->id);
            //$file_name = $now->format('Y-m-d-H-i-s') . '.' . $extension;
            $file_name = 'Document.' . $extension;
            Request::file('lead_magnet_file')->move($upload_path, $file_name);

            $page->update([
                'lead_magnet_file' => $file_name
            ]);
            return 'success';
        }
    }
}
