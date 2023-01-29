<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;


class DocumentController extends Controller
{
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    public function index()
    {
        $documents = $this->documentRepository->allDocument();
        return view('pages.document.index', compact('documents'));
    }

    public function create()
    {
        $signing = $this->documentRepository->signingList();
        return view('pages.document.create', compact('signing'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $validated = $request->validated();

        $this->documentRepository->storeDocument($validated);

        return redirect()->route('document.index')->with('success', 'Berhasil menambahkan document!');
    }

    public function edit($id)
    {
        $document = $this->documentRepository->getDocumentById($id);
        $signing = $this->documentRepository->signingList();

        return view('pages.document.edit', compact('document', 'signing'));
    }

    public function update($id, UpdateDocumentRequest $request)
    {
        $validated = $request->validated();

        $this->documentRepository->updateDocument($id, $validated);

        return redirect()->route('document.index')->with('success', 'Berhasil update document!');
    }

    public function destroy ($id)
    {
        $this->documentRepository->deleteDocumentById($id);

        return redirect()->route('document.index')->with('success', 'Berhasil haapus document!');
    }
  
}
