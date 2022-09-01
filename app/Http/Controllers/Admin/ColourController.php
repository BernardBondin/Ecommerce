<?php

namespace App\Http\Controllers\Admin;

use App\Models\Colour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColourFormRequest;

class ColourController extends Controller
{
    public function index() {
        $colours = Colour::all();
        return view('admin.colours.index', compact('colours'));
    }

    public function create() {
        return view('admin.colours.create');
    }

    public function store(ColourFormRequest $request) {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Colour::create($validatedData);
        return redirect('admin/colours/')->with('message', 'Colour Added Successfully!');
    }

    public function edit(Colour $colour) {
        return view('admin.colours.edit', compact('colour'));
    }

    public function update(ColourFormRequest $request, $colour_id) {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Colour::find($colour_id)->update($validatedData);
        return redirect('admin/colours')->with('message', 'Colour Updated Successfully!');
    }

    public function destroy($colour_id) {
        $colour = Colour::find($colour_id);
        $colour->delete();
        return redirect('admin/colours')->with('message', 'Colour Deleted Successfully!');
    }
    
}
