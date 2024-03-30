<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Preference;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function movies()
    {
        if (Auth::id()) {
            return view('userpanel.preference');
        } else {
            return redirect('/login');
        }
    }


    public function recommend()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Get the authenticated user
            $user_id = $user->id; // Access the user_id property from the user object

            // Retrieve preferences for the logged-in user
            $preferences = Preference::where('user_id', $user_id)->get();

            // Pass preferences data to the view
            return view('recommend', compact('preferences'));
        } else {
            return redirect('/login');
        }
    }

    public function preference(Request $request)
    {

        $messages = [
            'title1.required' => 'The title1 field is required.',
            'title2.required' => 'The title2 field is required.',
            'title3.required' => 'The title3 field is required.',
            'title1.string' => 'The title1 field must be a string.',
            'title2.string' => 'The title2 field must be a string.',
            'title3.string' => 'The title3 field must be a string.',
        ];

        $validatedData = $request->validate([
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'title3' => 'required|string|max:255',
        ], $messages);

        if (Auth::id()) {

            Preference::insert([
                [
                    'user_id' => Auth::user()->id,
                    'title' => $validatedData['title1'],

                    // $image =$request->image1,
                    // $imageName=time().'.'$image->getClientOriginalExtension(),
                    // $request->image->move('image',$imageName),
                    // 'image1' => $imageName,

                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => Auth::user()->id,
                    'title' => $validatedData['title2'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => Auth::user()->id,
                    'title' => $validatedData['title3'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);




            return redirect()->back()->with('message', 'Movies has been submitted successfully');
        } else {
            return redirect('/login');
        }
    }


    public function list()
    {
        if (Auth::user()) {
            $preferences = Preference::where('user_id', auth()->id())->get();
            $movies_list = Movie::select('id', 'title')->get();
            $comment = Comment::orderby('id', 'desc')->get();
            $reply = Reply::all();
            return view('list', compact('preferences', 'comment', 'reply', 'movies_list'));
        } else {
            return ('login');
        }
    }



    public function comment(Request $req)
    {
        if (Auth::id()) {
            Comment::create(
                [
                    'name' => Auth::user()->name,
                    'comment' => $req->comment,
                    'user_id' => Auth::user()->id
                ]
            );
            return redirect()->back()->with('message', 'Comments has been added successfully');
        } else {
            return redirect('/login');
        }
    }


    public function add_reply(Request $request)
    {
        if (Auth::id()) {
            Reply::create([
                'name' => Auth::user()->name,
                'comment_id' => $request->commentId,
                'reply' => $request->reply,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }


    public function edit_movies($id)
    {
        if (Auth::id()) {
            $prefer = Preference::find($id);
            $movies_list = Movie::select('id', 'title')->get();
            return view('update_movies', compact('prefer', 'movies_list'));
        } else {
            return redirect('/login');
        }
    }


    public function update_movies($id, Request $req)
    {
        if (Auth::id()) {
            $prefer = Preference::find($id);
            // dd($prefer);
            $prefer->title=$req->title;
            $prefer->save();
            return redirect()->back()->with('message', 'Movies has been updated successfully');
        } else {
            return redirect('/login');
        }
    }



    public function delete_movies($id)
    {
        if (Auth::id()) {
            $movies = Preference::findOrfail($id);
            $movies->delete();
            return redirect()->back()->with('message', 'Movies has been deleted successfully');
        } else {
            return redirect('login');
        }
    }
}
