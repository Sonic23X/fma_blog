<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{
    Blog,
    Image
};

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::find(1);

        $data = [
            'menu' => 'blogs',
            'blogs' => Blog::all(),
        ];
        return view('blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'menu' => 'blogs',
        ];
        return view('blog.new', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errorMessages = [
            'title.required' => 'Ingrese el titulo de la entrada',
            'title.max' => 'La longitud maxima es de 255 caracteres',
            'body.required' => 'El cuerpo de la entrada es obligatorio',
            'image.required' => 'La imagen es obligatoria'
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required',
        ], $errorMessages);

        $data = [
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request->body
        ];

        $blog = Blog::create($data);

        if ($request->file('image') != null) {
            $name =  Str::random(10).'.'.$request->file('image')->extension();
            $path = "blog/{$blog->id}/{$name}";
            $request->file('image')->storeAs("public/blog/{$blog->id}", $name);

            $image = Image::create([
                'imageable_type' => 'App\Models\Blog',
                'imageable_id' => $blog->id,
                'path' => $path
            ]);
        }
        
        return redirect('/blog');
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
        $data = [
            'menu' => 'blogs',
            'blog' => Blog::findOrFail($id)
        ];
        return view('blog.edit', $data);
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
        $errorMessages = [
            'title.required' => 'Ingrese el titulo de la entrada',
            'title.max' => 'La longitud maxima es de 255 caracteres',
            'body.required' => 'El cuerpo de la entrada es obligatorio',
        ];

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ], $errorMessages);

        $data = [
            'title' => $request->title,
            'content' => $request->body
        ];

        $blog = Blog::where('id', $id)->update($data);

        if ($request->file('image') != null) {
            $name =  Str::random(10).'.'.$request->file('image')->extension();
            $path = "blog/{$id}/{$name}";
            $request->file('image')->storeAs("public/blog/{$id}", $name);

            $image = Image::create([
                'imageable_type' => 'App\Models\Blog',
                'imageable_id' => $id,
                'path' => $path
            ]);
        }
        
        return redirect('/blog');
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
