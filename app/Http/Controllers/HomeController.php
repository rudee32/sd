<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Removed auth middleware to make home public
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $magazines = Content::where('type', 'majalah')
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        $poems = Content::where('type', 'puisi')
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        $halamanUtamaContents = Content::whereIn('type', ['editorial', 'news', 'agenda'])
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        $literasiContents = Content::whereIn('type', ['cerita_seru', 'puisi_cilik', 'baca_yuk', 'kata_baru'])
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        $numerasiContents = Content::whereIn('type', ['angka_ajaib', 'bermain_hitung', 'cerita_matematika', 'tips_hitung_cepat'])
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        $kreativitasContents = Content::whereIn('type', ['karya_kita', 'bintang_minggu_ini', 'foto_kegiatan'])
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        $edutainmentContents = Content::whereIn('type', ['teka_teki_seru', 'komik_edukasi', 'fun_facts'])
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(5);

        return view('home', compact(
            'magazines',
            'poems',
            'halamanUtamaContents',
            'literasiContents',
            'numerasiContents',
            'kreativitasContents',
            'edutainmentContents'
        ));
    }

    public function majalah()
    {
        $query = Content::where('type', 'majalah')
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(10);

        return view('magazines.index', ['query' => $query]);
    }

    public function puisi()
    {
        $query = Content::where('type', 'puisi')
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(10);

        return view('poems.index', ['query' => $query]);
    }

    public function beritaKategori($category)
    {
        $query = Content::where('type', 'berita')
            ->where('category', $category)
            ->when(\Schema::hasColumn('contents', 'status'), function ($query) {
                $query->where('status', 'approved');
            }, function ($query) {
                $query->whereNotNull('published_at');
            })
            ->latest()
            ->paginate(10);

        return view('berita', ['contents' => $query, 'category' => $category]);
    }

    public function halamanUtama()
    {
        $types = ['editorial', 'berita', 'agenda'];
        $query = Content::whereIn('type', $types)->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);

        // Fetch user's own uploads if authenticated
        $userUploads = collect();
        if (auth()->check()) {
            $userUploads = Content::where('user_id', auth()->id())
                ->with('comments')
                ->latest()
                ->take(5)
                ->get();
        }

        // Fetch menu features
        $menuFeaturesQuery = Content::where('is_menu_feature', true);
        if (\Schema::hasColumn('contents', 'status')) {
            $menuFeaturesQuery->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $menuFeaturesQuery->whereNotNull('published_at');
        }
        $menuFeatures = $menuFeaturesQuery->get();

        return view('halaman_utama', compact('contents', 'menuFeatures', 'userUploads'));
    }

    public function literasiCorner()
    {
        $types = ['cerita_seru', 'puisi_cilik', 'baca_yuk', 'kata_baru', 'olahraga', 'ekstrakulikuler'];
        $query = Content::whereIn('type', $types)->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi_corner', compact('contents'));
    }

    public function literasiCeritaSeru()
    {
        $query = Content::where('type', 'cerita_seru')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi.cerita_seru', compact('contents'));
    }

    public function literasiPuisiCilik()
    {
        $query = Content::where('type', 'puisi_cilik')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi.puisi_cilik', compact('contents'));
    }

    public function literasiBacaYuk()
    {
        $query = Content::where('type', 'baca_yuk')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi.baca_yuk', compact('contents'));
    }

    public function literasiKataBaru()
    {
        $query = Content::where('type', 'kata_baru')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi.kata_baru', compact('contents'));
    }

    public function numerasiZone()
    {
        $types = ['angka_ajaib', 'bermain_hitung', 'cerita_matematika', 'tips_hitung_cepat'];
        $query = Content::whereIn('type', $types)->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('numerasi_zone', compact('contents'));
    }

    public function numerasiAngkaAjaib()
    {
        $query = Content::where('type', 'angka_ajaib')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('numerasi.angka_ajaib', compact('contents'));
    }

    public function numerasiBermainHitung()
    {
        $query = Content::where('type', 'bermain_hitung')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('numerasi.bermain_hitung', compact('contents'));
    }

    public function numerasiCeritaMatematika()
    {
        $query = Content::where('type', 'cerita_matematika')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('numerasi.cerita_matematika', compact('contents'));
    }

    public function numerasiTipsHitungCepat()
    {
        $query = Content::where('type', 'tips_hitung_cepat')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('numerasi.tips_hitung_cepat', compact('contents'));
    }

    public function kreativitasSiswa()
    {
        $types = ['karya_kita', 'bintang_minggu_ini', 'foto_kegiatan'];
        $query = Content::whereIn('type', $types)->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('kreativitas_siswa', compact('contents'));
    }

    public function kreativitasKaryaKita()
    {
        $query = Content::where('type', 'karya_kita')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('kreativitas.karya_kita', compact('contents'));
    }

    public function kreativitasBintangMingguIni()
    {
        $query = Content::where('type', 'bintang_minggu_ini')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('kreativitas.bintang_minggu_ini', compact('contents'));
    }

    public function kreativitasFotoKegiatan()
    {
        $query = Content::where('type', 'foto_kegiatan')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('kreativitas.foto_kegiatan', compact('contents'));
    }

    public function edutainment()
    {
        $types = ['teka_teki_seru', 'komik_edukasi', 'fun_facts'];
        $query = Content::whereIn('type', $types)->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('edutainment', compact('contents'));
    }

    public function edutainmentTekaTekiSeru()
    {
        $query = Content::where('type', 'teka_teki_seru')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('edutainment.teka_teki_seru', compact('contents'));
    }

    public function edutainmentKomikEdukasi()
    {
        $query = Content::where('type', 'komik_edukasi')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('edutainment.komik_edukasi', compact('contents'));
    }

    public function edutainmentFunFacts()
    {
        $query = Content::where('type', 'fun_facts')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('edutainment.fun_facts', compact('contents'));
    }

    public function showContent($id)
    {
        $content = Content::with('comments', 'user')->findOrFail($id);
        return view('content.show', compact('content'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $content = Content::findOrFail($id);

        $content->comments()->create([
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function literasiOlahraga()
    {
        $query = Content::where('type', 'olahraga')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi.olahraga', compact('contents'));
    }

    public function literasiEkstrakulikuler()
    {
        $query = Content::where('type', 'ekstrakulikuler')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('literasi.ekstrakulikuler', compact('contents'));
    }

    public function editorial()
    {
        $query = Content::where('type', 'editorial')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('editorial', compact('contents'));
    }

    public function berita()
    {
        $query = Content::where('type', 'berita')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('berita', compact('contents'));
    }

    public function agenda()
    {
        $query = Content::where('type', 'agenda')->with('comments');
        if (\Schema::hasColumn('contents', 'status')) {
            $query->where('status', 'approved');
        } elseif (\Schema::hasColumn('contents', 'published_at')) {
            $query->whereNotNull('published_at');
        }
        $contents = $query->latest()->paginate(10);
        return view('agenda', compact('contents'));
    }
}
