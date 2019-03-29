<?php

namespace App\Http\Controllers;

use App\Http\Requests\Present\StoreRequest;
use App\Models\Present;
use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
use File;
use DB;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search')) {
            $presents = Present::where('title', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $presents = Present::all();
        }
        return view('presents.index')->with(compact('presents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presents.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function store(StoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $pdf = new Pdf($request->pdf->getRealPath());

            $insertParameter = $request->all();
            $insertParameter['max_slide_page'] = $pdf->getNumberOfPages();
            $present = Present::create($insertParameter);

            File::makeDirectory(public_path('pdf/' . $present->id));
            for ($i = 1; $i <= $pdf->getNumberOfPages(); $i++) {
                $pdf->setPage($i)->setOutputFormat('jpg')->saveImage(public_path('pdf/' . $present->id . '/'));
            }
        });
        return redirect(route('presents.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $present = Present::findOrFail($id);

        return view('presents.show')->with(compact('present', 'id'));
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
