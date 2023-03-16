<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatModel;
use Illuminate\Support\Facades\Storage;

class CandidatController extends Controller
{
    public function index() {
        // Define variabel
        $data = ['title' => 'Candidat List', 'candidats' => CandidatModel::all()];

        // Return view with data
        return view('candidat/index', $data);
    }

    public function show($id) {
        // Define variabel
        $data = ['title' => 'Detail Candidat', 'candidat' => CandidatModel::findOrFail($id)];

        // Return view with data
        return view('candidat/detail', $data);
    }

    public function create() {
        // Define variabel
        $data = ['title' => 'Create Candidat'];

        // Return view with data
        return view('candidat/create', $data);
    }

    
    public function save(Request $request) {
        // Validation rules
        $validateData = $request->validate([
            'name' => 'required',
            'education' => 'required',
            'birthday' => 'required|date',
            'experience' => 'required',
            'last_position' => 'required',
            'applied_position' => 'required',
            'skills' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max_digits:18|numeric',
            'resume' => 'required|file|max:2048|mimetypes:application/pdf',
        ]);

        // Store image in storage folder
        $validateData['resume'] = $request->file('resume')->store('uploads');

        // Get and implode skills array
        $skills = '';
        if (isset($validateData['skills'])) {
            $skills = implode(',', $validateData['skills']);
        }

        // Add skills to array $validateData
        $validateData['skills'] = $skills;

        // Insert to DB
        CandidatModel::create($validateData);

        // Redirect to candidat list page
        return redirect('/candidat')->with('success', 'Candidat created');
    }

    public function edit($id) {
        // Define variabel
        $data = ['title' => 'Edit Candidat', 'candidat' => CandidatModel::findOrFail($id)];

        // Return view with data
        return view('candidat/edit', $data);
    }   

    public function update(Request $request, $id) {
        // Check if file resume exist
        $resumeRules = '';
        if($request->file('resume')) {
            $resumeRules = 'file|max:2048|mimetypes:application/pdf';
        }

        // Validation rules
        $validateData = $request->validate([
            'name' => 'required',
            'education' => 'required',
            'birthday' => 'required|date',
            'experience' => 'required',
            'last_position' => 'required',
            'applied_position' => 'required',
            'skills' => 'required',
            'email' => 'required|email',
            'phone' => 'required|max_digits:18|numeric',
            'resume' => $resumeRules,
        ]);

        // Store image in storage folder
        if($request->file('resume')) {
            $validateData['resume'] = $request->file('resume')->store('uploads');
        }
        
        // Get and implode skills array
        $skills = '';
        if (isset($validateData['skills'])) {
            $skills = implode(',', $validateData['skills']);
        }

        // Add skills to array $validateData
        $validateData['skills'] = $skills;

        // Update data from DB
        CandidatModel::where('id', $id)->update($validateData);

        // Redirect to candidate list page
        return redirect('/candidat')->with('success', 'Candidat updated');
    }
    
    public function delete($id) {
        // Get data user from DB
        $candidat = CandidatModel::findOrFail($id);

        // Check if file resume exist and delete from storage
        if($candidat['resume']) {
            Storage::delete($candidat['resume']);
        }

        // Delete data from DB
        CandidatModel::destroy($id);

        // Redirect to candidat list page
        return redirect('/candidat')->with('success', 'Candidat deleted');
    }
}
