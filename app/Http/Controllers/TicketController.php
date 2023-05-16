<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.ticket");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($ticketId)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'ticketId' => ['required'],
        ], [
                'ticketId.required' => 'ID Ticket must be filled!',
            ]);

        $ticket = Checkout::where(['ticket_id' => $request->ticketId])->first();

        if (empty($ticket)) {
            return redirect()->back()->with('failed', 'ID Ticket is not found!');
        }

        if ($ticket->is_checkin == true) {
            return redirect()->back()->with('failed', 'ID Ticket has been used!');
        }

        $ticket->is_checkin = true;

        $ticket->save();

        return redirect()->back()->with('success', 'Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
