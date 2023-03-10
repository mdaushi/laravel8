<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Document;
use App\Notifications\SigningDocumentNotification;
use Carbon\Carbon;

class DocumentRepository
{
    public function storeDocument($request)
    {
        $nameFile = $request['content']->getClientOriginalName();
        
        $doc = Document::create([
            'title' => $request['title'], 
            'content' => $nameFile, 
            'signing' => $request['signing'],
            'uploader' => auth()->user()->id
        ]);

        if(isset($request['content']) && $request['content']->isValid())
        {
            $doc->addMediaFromRequest('content')->toMediaCollection('document');
        }

        // send notification to signing user
        // this is an example, using the default template without modification
        $signing = User::find($request['signing']);
        $signing->notify(new SigningDocumentNotification());
        
    }

    private function dataSigningList()
    {
        return User::whereNotIn('id', [auth()->user()->id]);
    }

    public function signingList()
    {
        return $this->dataSigningList()->pluck('email', 'id');
    }

    public function signingListArray()
    {
        return $this->dataSigningList()->get(['id', 'email']);
    }

    public function allDocument()
    {
        return Document::with(['signing_id.profile', 'uploader_id.profile'])->where('uploader', auth()->user()->id)->orWhere('signing', auth()->user()->id)->get();
    }

    public function getDocumentById(int $id)
    {
        return Document::find($id);
    }

    public function updateDocument($id, $request)
    {
        $columnStore = [
            'title' => $request['title'], 
            'signing' => $request['signing'],
            'uploader' => auth()->user()->id
        ];

        if(isset($request['content']) && $request['content']->isValid()){
            $nameFile = $request['content']->getClientOriginalName();
            $columnStore['content'] = $nameFile;
        }

        $doc = Document::find($id);
        $doc->update($columnStore);

        if(isset($request['content']) && $request['content']->isValid())
        {
            $doc->addMediaFromRequest('content')->toMediaCollection('document');
        }

    }

    public function deleteDocumentById($id)
    {
        return Document::find($id)->delete();
    }

    public function verifyDocument($id)
    {
        return Document::find($id)->update([
            'signed_at' => Carbon::now()
        ]);
    }
}