<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function delete($id)
    {
        File::findOrFail($id)->delete();
        return redirect()->back()->with('delete',trans('admin.deletemsg'));
    }
}
