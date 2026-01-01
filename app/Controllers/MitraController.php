<?php

namespace App\Controllers;

use App\Models\MitraModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\IOFactory as SpreadSheetIO;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;

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

    public function importProcess(){
        $file = $this->request->getFile('file_excel');
        if(!$file->isValid() || !in_array($file->getMimeType(), [
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/octet-stream'
        ])){
            return redirect()->to('/admin/mitra')->with('error', 'Gagal mengunggah file. Pastikan file menggunakan format Excel (.xls/.xlsx).');
        }
        try{
            $spreadsheet = SpreadSheetIO::load($file->getTempName());
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $dataBatch = [];
            $count = 0;

            foreach($sheetData as $idx => $row){
             if($idx == 1) continue; 
             if(!empty($row['A'])){
                $dataBatch[] = [
                    'name'    => $row['A'],
                    'jobs'    => $row['B'] ?? null,
                    'address' => $row['C'] ?? null,
                    'phone'   => $row['D'] ?? null,
                ];
                $count++;
             }
            }
            if(!empty($dataBatch)){
                $model = new MitraModel();
                $model->insertBatch($dataBatch);
                return redirect()->to('/admin/mitra')->with('message', 'Berhasil import  ' . $count . ' data mitra.');
            }
            return redirect()->to('/admin/mitra')->with('error', 'File Excel kosong.');
        } catch(\Exception $e){
            return redirect()->to('/admin/mitra')->with('error', 'Gagal memproses file Excel: ' . $e->getMessage());
        }
    }

    public function exportPdf(){
        $model = new MitraModel();
        $data['mitra'] = $model->orderBy('created_at', 'DESC')->findAll();

        $html = view('admin/mitra_pdf', $data);

        $options = new Options();
        $options->set('isRemotedEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('laporan_mitra_basuki.pdf', ['Attachment' => true]);
        exit;
    }

    public function exportDocx(){
        $model = new MitraModel();
        $mitra = $model->findAll();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Data Mitra Basuki Admin', ['size' => 16, 'bold' => true]);
        $section->addTextBreak(1);

        $table = $section->addTable(['borderSize' => 6, 'borderColor' => '999999']);

        $headerStyle = ['bgColor' => 'E0E0E0', 'valign' => 'center'];
        $textHeaderStyle = ['bold' => true, 'align' => 'center'];

        $table->addRow();
        $table->addCell(2000, $headerStyle)->addText('Nama', $textHeaderStyle);
        $table->addCell(2000, $headerStyle)->addText('Job', $textHeaderStyle);
        $table->addCell(2000, $headerStyle)->addText('Alamat', $textHeaderStyle);
        $table->addCell(2000, $headerStyle)->addText('No HP', $textHeaderStyle);

        foreach($mitra as $m){
            $table->addRow();

            $nama = htmlspecialchars($m['name'] ?? '', ENT_QUOTES, 'UTF-8');
            $pekerjaan = htmlspecialchars($m['jobs'] ?? '', ENT_QUOTES, 'UTF-8');
            $alamat = htmlspecialchars($m['address'] ?? '', ENT_QUOTES, 'UTF-8');
            $telepon = htmlspecialchars($m['phone'] ?? '', ENT_QUOTES, 'UTF-8');
            
            $table->addCell(2000)->addText($nama);
            $table->addCell(2000)->addText($pekerjaan);
            $table->addCell(2000)->addText($alamat);
            $table->addCell(2000)->addText($telepon);
        }
        $filename = 'Laporan_mitra_basuki.docx';

        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');

        $xmlWriter = WordIOFactory::createWriter($phpWord, 'Word2007');
        $temp_file = tempnam(sys_get_temp_dir(), 'word');
        $xmlWriter->save($temp_file);

        if(ob_get_length()){
            ob_end_clean();
        }

        return $this->response->download($temp_file, null)->setFileName($filename);
    }
}
?>