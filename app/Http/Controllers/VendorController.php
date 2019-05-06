<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $inc = 1;
        $vendors = Vendor::paginate(10);
        
        $params = [
            'title' => 'Vedors Listing',
            'inc' => $inc,
            'vendors' => $vendors,
        ];

        return view('AdminPages.Vendor.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create Vendor',
        ];

        return view('AdminPages.Vendor.vendor_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $vendor = Vendor::create([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('vendor.index')->with('success', "The Vendor <strong>$vendor->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $vendor = Vendor::findOrFail($id);

            $params = [
                'title' => 'Confirm Delete Record',
                'vendor' => $vendor,
            ];

            return view('AdminPages.Vendor.vendor_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $vendor = Vendor::findOrFail($id);

            $params = [
                'title' => 'Edit Vendor',
                'vendor' => $vendor,
            ];

            return view('AdminPages.Vendor.vendor_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $vendor = Vendor::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'address' => 'required',
            ]);

            $vendor->name = $request->input('name');
            $vendor->mobile = $request->input('mobile');
            $vendor->email = $request->input('email');
            $vendor->address = $request->input('address');

            $vendor->save();

            return redirect()->route('vendor.index')->with('success', "The vendor <strong>$vendor->name</strong> has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vendor = Vendor::findOrFail($id);

            $vendor->delete();

            return redirect()->route('vendor.index')->with('success', "The vendor <strong>$vendor->name</strong> has successfully been archived.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}
