<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Request;
use Redirect;
use Mailchimp;
use Mail;
use DB;

use App\Lead;
use App\Page;
use App\PageSlide;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id()) {
            $pages = DB::table('pages')
                ->where('user_id', Auth::id())
                ->get();
            if (count($pages) > 0) {
                foreach($pages as $page) {
                    $pages_id[] = $page->id;
                }
                $leads = DB::table('leads')->whereIn('page_id', $pages_id);
                if (Auth::user()->rights == 'admin') {
                    $leads = Lead::orderByDesc('id')
                        ->get();
                } else {
                    $leads = DB::table('leads')->whereIn('page_id', $pages_id);
                }
            } else {
                return View('leads.index')
                    ->with('leads', $leads);
            }

        } else {
            return Redirect::to('/pages');
        }

        return View('leads.index')
            ->with('leads', $leads);
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
        $data = array(
            'page_id' => Request::get('page_id'),
            'source' => Request::server("HTTP_REFERER"),

            'name' => Request::get('name'),
            'email' => Request::get('email'),
            'phone' => Request::get('phone'),

            'address' => Request::get('address'),
            'size' => Request::get('size'),
            'color' => Request::get('color'),
            'comment' => Request::get('comment'),
            'fio' => Request::get('fio'),

            'paided' => Request::get('paided'),
            'status' => Request::get('status')
        );

        $lead = new Lead;
        $lead_last_id = $lead->create($data)->id;
        $lead = Lead::find($lead_last_id);

        $data['lead_id'] = $lead_last_id;
        $data['email_author'] = $lead->page->email;

        if ($lead->page->email) {
            Mail::send("emails.lead", $data, function ($message) use ($data) {
                $message->from("info@lpkit.ru", "lpkit.ru");
                $message->to($data['email_author']);
                $message->subject("Заявка от " . $data['source'] . " в " . date ("Y.m.d H:m:s"));
            });
        }

        if($lead->page->mailchimp_api_key and $lead->page->mailchimp_list_id) {
            $mailchimp = new Mailchimp($lead->page->mailchimp_api_key);
            $mailchimp_list_id = $lead->page->mailchimp_list_id;

            try {
                $mailchimp->lists->subscribe(
                    $mailchimp_list_id,
                    ["email" => Request::get("email")]
                );
            } catch (\Mailchimp_List_AlreadySubscribed $e) {
                if ($lead->page->redirect) {
                    return Redirect::to($lead->page->redirect);
                } else {
                    return var_dump($e);
                }
            } catch (\Mailchimp_Error $e) {
                return var_dump($e);
            }
        }

        if (isset($lead->page->lead_magnet_file)) {
            return Redirect::to('/files/' . $lead->page->id . '/' . $lead->page->lead_magnet_file);
        } elseif (isset($lead->page->redirect)) {
            return Redirect::to($lead->page->redirect);
        }

        return redirect()->action('PageController@thanks', ['id' => Request::get('page_id')]);
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
    public function update(Request $request, $id)
    {
        //
    }

    public function updatestatus(Request $request) {
        $lead = Lead::find(Request::get("id"));
        $lead->update([
            Request::get("namei") => Request::get("valuei")
        ]);
        return Request::get("valuei");
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
}
