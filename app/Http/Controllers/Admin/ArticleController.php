<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\Article as AdminArticle;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index']]);
        $this->middleware('permission:article-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:article-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:article-show', ['only' => ['show']]);
        $this->middleware('permission:article-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Article::select(['id', 'title', 'content', 'image']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($row) {
                    return '<img src="' . asset($row->image) . '" alt="Thumbnail" width="50" height="50">';
                })
                ->addColumn('action', function ($row) {
                    return '<div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown">
                                        <i class="icon-menu7"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="' . route('article.show', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-stats"></i> Detail Data
                                        </a>
                                        <a href="' . route('article.edit', $row->id) . '" class="dropdown-item">
                                            <i class="icon-file-text2"></i> Edit Data
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="confirmDelete(' . $row->id . ')">
                                            <i class="icon-file-minus"></i> Hapus Data
                                        </a>
                                    </div>
                                </div>
                            </div>';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        $article = Article::all();
        return view('admin.article.index', compact('article'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('article', 'public');
            $data['image'] = "/storage/" . $path;
        }
        $article = Article::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil disimpan!',
            'id' => $article->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $populerArticle = Article::latest()->take(5)->get();
        return view('admin.article.show', compact('article', 'populerArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.create-edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // Simpan file ke "storage/app/public/game-event"
            $path = $request->file('image')->store('article', 'public');

            // Simpan path yang benar untuk ditampilkan di frontend
            $data['image'] = "/storage/" . $path;
        }
        $article->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diperbarui',
            'id' => $article->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $article->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan! Data gagal dihapus.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
