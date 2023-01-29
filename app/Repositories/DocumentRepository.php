<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Document;

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
    }

    public function signingList()
    {
        return User::whereNotIn('id', [auth()->user()->id])->pluck('email', 'id');
    }

    public function allDocument()
    {
        return Document::with(['signing_id', 'uploader_id'])->where('uploader', auth()->user()->id)->orWhere('signing', auth()->user()->id)->get();
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
}