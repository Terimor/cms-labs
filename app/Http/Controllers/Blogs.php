<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Blog;

class Blogs extends Controller
{
    public function show(Request $request, Blog $blog = null) {
        if (!$blog) {
            $blog = Blog::find(Blog::ROOT_ELEMENT_ID);
        }

        return $this->renderModel($blog);
    }

    public function adminShow(Request $request, Blog $blog = null) {
        if (!$blog) {
            $blog = Blog::find(Blog::ROOT_ELEMENT_ID);
        }

        return view($blog->getAdminTemplateName(), ['model' => $blog]);
    }

    public function edit(Request $request, Blog $blog = null) {
        if (!$blog) {
            $blog = Blog::find(Blog::ROOT_ELEMENT_ID);
        }

        return view($blog->getAdminEditTemplateName(), ['model' => $blog]);
    }

    public function save(Request $request, Blog $blog = null) {
        if (!$blog) {
            $blog = Blog::find(Blog::ROOT_ELEMENT_ID);
        }
        $blog->update(Input::all());
        return redirect()->to('/admin/blogs/'.$blog->parent_id);
    }
}
