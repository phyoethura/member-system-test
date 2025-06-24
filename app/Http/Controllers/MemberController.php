<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Member::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('surname', 'LIKE', "%{$search}%");
            });
        }

        // Sort by age
        if ($request->has('sort') && $request->sort == 'age') {
            $query->orderBy('date_of_birth', $request->get('direction', 'asc') == 'asc' ? 'desc' : 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $members = $query->paginate(10);

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|in:Mr.,Mrs.,Miss',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'title' => 'required|in:Mr.,Mrs.,Miss',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture
            if ($member->profile_picture) {
                Storage::disk('public')->delete($member->profile_picture);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $member->update($data);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if ($member->profile_picture) {
            Storage::disk('public')->delete($member->profile_picture);
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
    
    public function reports()
    {
        $ageGroups = [
            '0-10' => 0,
            '11-20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51-60' => 0,
            '60+' => 0
        ];

        $members = Member::all();

        foreach ($members as $member) {
            $age = $member->age;
            
            if ($age <= 10) $ageGroups['0-10']++;
            elseif ($age <= 20) $ageGroups['11-20']++;
            elseif ($age <= 30) $ageGroups['21-30']++;
            elseif ($age <= 40) $ageGroups['31-40']++;
            elseif ($age <= 50) $ageGroups['41-50']++;
            elseif ($age <= 60) $ageGroups['51-60']++;
            else $ageGroups['60+']++;
        }

        return view('members.reports', compact('ageGroups', 'members'));
    }
}
