<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Document;

class LdaController extends GeneralController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $name)
    {
        $document = Document::where('name', $name)->first();
        return view($this->language . '/lda/document', ['document' => $document]);
    }
    // public function foundation(Request $request)
    // {
    //     $title = "Foundation of the Association";
    //     $url = "/uploads/lda/lda_foundation.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

    // public function dentistry_regulations(Request $request)
    // {
    //     $title = "Dentistry Regulations";
    //     $url = "/uploads/lda/lda_dentistry_regulations.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

    // public function internal_regulations(Request $request)
    // {
    //     $title = "Internal Regulations";
    //     $url = "/uploads/lda/lda_internal_regulations.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

    // public function retirement_fund(Request $request)
    // {
    //     $title = "Retirement Fund";
    //     $url = "/uploads/lda/lda_retirement_fund.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

    // public function mutual_fund(Request $request)
    // {
    //     $title = "Mutual Fund";
    //     $url = "/uploads/lda/lda_mutual_fund.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

    // public function dentists_duties(Request $request)
    // {
    //     $title = "Dentists Duties";
    //     $url = "/uploads/lda/lda_dentists_duties.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

    // public function new_clinic_standards(Request $request)
    // {
    //     $title = "New Clinic Standards";
    //     $url = "/uploads/lda/lda_new_clinic_standards.pdf";
    //     return view($this->language . '/lda/document', ['title' => $title, 'url' => $url]);
    // }

}

// Foundation of the syndicate