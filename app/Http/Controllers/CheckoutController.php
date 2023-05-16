<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function list()
    {
        Paginator::useBootstrap();

        $checkout = Checkout::latest()->paginate(5);

        $data = [
            'checkout' => $checkout
        ];

        return view('pages.order', $data);
    }

    public function checkout(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phoneNumber' => ['required'],
        ], [
            'name.required' => 'Name must be filled!',
            'email.required' => 'Email must be filled!',
            'phoneNumber.required' => 'Phone Number must be filled!',
        ]);

        $ticketId = Str::uuid();

        $create = new Checkout([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'ticket_id' => $ticketId,
            'is_checkin' => false
        ]);

        $create->save();

        return redirect()->back()->with('success', $ticketId);
    }

    public function edit($id)
    {
        $checkout = Checkout::where(['id' => $id])->first();

        $data = [
            'checkout' => $checkout
        ];

        return view('pages.edit-order', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phoneNumber' => ['required'],
        ], [
            'name.required' => 'Name must be filled!',
            'email.required' => 'Email must be filled!',
            'phoneNumber.required' => 'Phone Number must be filled!',
        ]);

        
        $checkout = Checkout::where(['id' => $id])->first();

        if (empty($checkout)) {
            return redirect()->back()->with('failed', 'ID not found!');
        }

        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->phone_number = $request->phoneNumber;

        $checkout->save();

        return redirect()->back()->with('success', 'Successfully');
    }

    public function destroy($id)
    {
        $checkout = Checkout::where(['id' => $id])->first();

        $checkout->delete();

        return redirect()->back()->with('success', 'Successfully');
    }

}
