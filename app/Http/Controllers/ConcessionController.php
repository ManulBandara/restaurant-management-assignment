<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConcessionRequest;
use App\Repositories\ConcessionRepository;
use Illuminate\Support\Facades\Storage;

class ConcessionController extends Controller
{
    protected $repository;

    public function __construct(ConcessionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $concessions = $this->repository->all();
        return view('concessions.index', compact('concessions'));
    }

    public function create()
    {
        return view('concessions.create');
    }

    public function store(StoreConcessionRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('concessions', 'public');
        }
        $this->repository->create($data);
        return redirect()->route('concessions.index')->with('success', 'Concession created successfully.');
    }

    public function edit($id)
    {
        $concession = $this->repository->find($id);
        return view('concessions.edit', compact('concession'));
    }

    public function update(StoreConcessionRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('concessions', 'public');
        }
        $this->repository->update($id, $data);
        return redirect()->route('concessions.index')->with('success', 'Concession updated successfully.');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('concessions.index')->with('success', 'Concession deleted successfully.');
    }
}