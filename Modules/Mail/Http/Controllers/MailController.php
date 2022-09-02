<?php

namespace Modules\Mail\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Mail\Services\MailService;

class MailController extends Controller
{
    
    /**
     * @var mailService
     */
    protected $mailService;

    /**
     * MailController Constructor
     *
     * @param MailService $mailService
     *
     */
    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //dd(public_path('storage'));
        //dd(storage_path('app').'/public/attachments/j95CpDUFXm1IbkGxU1vKQCmntqBjUAeCZcyHeVCp.pdf');
        return view('mail::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('mail::index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'sender',
            'recipient',
            'title',
            'content',
        ]);

        $data['attachment'] = $request->file('attachment');

        //dump($request);
        //dd($data);

        $mail = $this->mailService->sendMail($data);
        
        return redirect()->back()->with(['success' => 'Udalo sie']); 
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('mail::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('mail::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
