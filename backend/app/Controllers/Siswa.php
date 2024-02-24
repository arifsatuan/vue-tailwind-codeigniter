<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Siswa extends ResourceController
{
    protected $modelName = 'App\Models\SiswaModel'; // Ensure this model exists and is properly set up
    protected $format    = 'json';

    // GET: List all records
    public function index()
    {
        $data = $this->model
        ->select('nipd, nama, nama_rombel')
        ->where('is_active', 1)
        ->findAll();
        return $this->respond($data);
    }

    // GET: Fetch a single record by ID
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        }
        
        return $this->failNotFound('No record found with id ' . $id);
    }

    // POST: Create a new record
    public function create()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        
        return $this->respondCreated($data);
    }

    // PUT or PATCH: Update a record
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        $this->model->save($data);
        
        return $this->respond($data);
    }

    // DELETE: Delete a record
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            return $this->respondDeleted($data);
        }
        
        return $this->failNotFound('No record found with id ' . $id);
    }
}