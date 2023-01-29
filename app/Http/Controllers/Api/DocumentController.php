<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Repositories\DocumentRepository;

class DocumentController extends Controller
{

    private $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function listSigning()
    {
        $lists = $this->documentRepository->signingListArray();

        return response()->jsonSuccess($lists, 'list signing');
    }
    
    public function index()
    {
        $documents = $this->documentRepository->allDocument();

        return response()->jsonSuccess($documents, 'Documents');
    }

    public function store(StoreDocumentRequest $request)
    {
        $validated = $request->validated();

        $this->documentRepository->storeDocument($validated);

        return response()->jsonSuccess([], 'Document berhasil tambah');
    }

    public function update($id, UpdateDocumentRequest $request)
    {
        $validated = $request->validated();

        $this->documentRepository->updateDocument($id, $validated);

        return response()->jsonSuccess([], 'Document berhasil diupdate'); 
    }

    public function destroy($id)
    {
        $this->documentRepository->deleteDocumentById($id);
        return response()->jsonSuccess([], 'Document berhasil dihapus'); 
    }

    public function verify($id)
    {
        $this->documentRepository->verifyDocument($id);
        return response()->jsonSuccess([], 'Document berhasil ditandatangani'); 
    }
}
