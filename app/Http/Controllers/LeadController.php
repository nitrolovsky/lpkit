<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use Mailchimp;
use Mail;

use App\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                $message->from("info@genlid.com", "genlid.com");
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

        $page = Page::find(Request::get('page_id'));
        return view('pages.thanks')
            ->with('page', $page);
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
