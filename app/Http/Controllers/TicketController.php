<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        $data = $request->all();
        $ticket = Ticket::create($data);

        return response()->json('Ticket created successfully' . $ticket, 201);
    }

    public function statusUpdate(Request $request, $ticketId)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,escalated,resolved,closed'
        ]);

        $ticket = Ticket::findOrFail($ticketId);

        $preStatus = $ticket->status;

        $ticketAction = match ($preStatus) {
            'open' => ['in_progress', 'escalated'],
            'in_progress' => ['resolved', 'escalated'],
            'escalated' => ['in_progress', 'resolved'],
            'resolved' => ['closed', 'reopen'],
            'closed' => ['reopen'],
            default => []
        };
        if (!in_array($request->status, $ticketAction)) {
            return response()->json([
                'error' => 'Invalid status transition',
                'ticket_id' => $ticketId,
                'current_status' => $preStatus,
                'allowed_status' => $ticketAction
            ], 422);
        }
        $currentStatus = $request->status;

        $ticket->update([
            'status'=>$request->status
        ]);

        return response()->json([
            'ticket_id'=>$ticketId,
            'previous_status' => $preStatus,
            'new_status'=>$currentStatus
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
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
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
