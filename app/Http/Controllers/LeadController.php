<?php

namespace App\Http\Controllers;

use Request;
use Redirect;
use Mailchimp;

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
        $lead = new Lead;

        $lead_last_id = $lead->create([
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
        ])->id;
        $lead = Lead::find($lead_last_id);

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
                    return Redirect::to($lead->page->redirect)
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
