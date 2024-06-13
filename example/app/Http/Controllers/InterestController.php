<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterestRequest;
use App\Http\Requests\UpdateInterestRequest;
use App\Models\Interest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class InterestController extends Controller
{
    private User $user;

    public function __construct()
    {
        if (Auth::check())
            $this->user = Auth::user();
    }

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            // 'auth',
            // new Middleware('auth', only: ['edit']),
            new Middleware('auth', except: ['show']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('interests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $this->user->interests()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);


        return redirect('profile')->with('success', 'Interest was addddeddd');
    }



    /**
     * Display the specified resource.
     */
    public function show(Interest $interest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interest $interest)
    {
        Gate::authorize('modify', $interest);

        return view ('interests.edit', [
            'interest' => $interest
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interest $interest)
    {
        Gate::authorize('modify', $interest);

        
        $fields = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required']
        ]);

        $interest->update($fields);

        return redirect('profile')->with('success', 'Updated successfullyy');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interest $interest)
    {
        Gate::authorize('modify', $interest);

        $interest->delete();

        return back()->with('success', 'Interest wass  deleted');
    }
}
