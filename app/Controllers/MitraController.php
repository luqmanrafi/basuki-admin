<?php

namespace App\Controllers;

use App\Models\MitraModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class MitraController extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return string
     */
    public function index()
    {
        $model = new MitraModel;
        $data['mitra'] = $model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/mitra', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $model = new MitraModel();
        $data['mitra'] = $model->find($id);
        if(empty($data['mitra'])) {
            throw new PageNotFoundException('Mitra not found: ' . $id);
        }

        return view('admin/edit_mitra', $data);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('admin/new_mitra');
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $rules = [
            'name' => 'required',
            'phone' => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validation failed. Please check the form.');
        }

        $model = new MitraModel();

        $model->save([
            'name'    => $this->request->getPost('name'),
            'jobs'    => $this->request->getPost('jobs'),
            'address' => $this->request->getPost('address'),
            'phone'   => $this->request->getPost('phone')
        ]);

        return redirect()->to('/admin/mitra')->with('message', 'Mitra created successfully.');
    }

    /**
     * Create a new resource object from a JSON request.
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function createApi()
    {
        $model = new MitraModel();
        $json = $this->request->getJSON();

        if (empty($json->name)) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Name is required.']);
        }

        $data = [
            'name'    => $json->name,
            'jobs'    => $json->jobs ?? null,
            'address' => $json->address ?? null,
            'phone'   => $json->phone ?? null,
        ];

        if ($model->insert($data)) {
            $newId = $model->getInsertID();
            return $this->response->setStatusCode(201)->setJSON(['message' => 'Mitra created successfully.', 'id' => $newId]);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to create mitra.']);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'permit_empty|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Validation failed. Please check the form.');
        }

        $model = new MitraModel();

        $model->update($id, [
            'name'    => $this->request->getPost('name'),
            'jobs'    => $this->request->getPost('jobs'),
            'address' => $this->request->getPost('address'),
            'phone'   => $this->request->getPost('phone')
        ]);

        return redirect()->to('/admin/mitra')->with('message', 'Mitra updated successfully.');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $model = new MitraModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            return redirect()->to('/admin/mitra')->with('message', 'Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Mitra not found');
        }
    }
}