<?php

namespace App\Controllers;

use App\Models\Tabeltitikwisata;

class Home extends BaseController
{
    protected $tabeltitikwisata;

    public function __construct()
    {
        $this->tabeltitikwisata = new Tabeltitikwisata();
    }

    public function peta()
    {
        return view('v_peta');
    }
    public function landing()
    {
        return view('v_landing');
    }
    public function tabel()
    {
        $data['dataobjek'] = $this->tabeltitikwisata->findAll();

        return view('v_tabel', $data);
    }
    public function hapus_data($gid)
    {
        $this->tabeltitikwisata->delete($gid);
        return redirect()->to(base_url('home/tabel'))->with('message', array(
            'type' => "success",
            'content' => 'Data Berhasil Dihapus'
        ));
    }

    public function edit_data($gid)
    {
        $data['dataobjek'] = $this->tabeltitikwisata->find($gid);
        return view('v_edit', $data);
        //dd($data['dataobjek']);
    }

    public function data_detail($gid)
    {
        $data['dataobjek'] = $this->tabeltitikwisata->find($gid);
        return view('v_detail', $data);
        //dd($data['dataobjek']);
    }

    public function simpan_edit_data($gid)
    {
        // menangkap file upload
        $foto = $this->request->getFile('foto');
        $fotolama = $_POST['fotolama'];
        if ($foto->getError() == 4) {
            $nama_foto = NULL;
        } else {
            // membuat file upload
            $foto_dir = 'upload/foto-objek/';
            if (!is_dir($foto_dir)) {
                mkdir($foto_dir, 0777, TRUE);
            }
            //hapus foto lama
            if ($fotolama != "") {
                unlink($foto_dir . $fotolama);
            }
            // menangkap nama file
            $nama_foto = preg_replace('/\s+/', '-', $foto->getName());

            // menambahkan foto
            $foto->move($foto_dir, $nama_foto);
        }

        $data = [
            'gid' => $gid,
            'nama' => $_POST['wisata'],
            'deskripsi' => $_POST['deskripsi'],
            'alamat' => $_POST['alamat'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'htm' => $_POST['htm'],
            'jenis' => $_POST['jenis'],
            'foto' => $nama_foto,
        ];

        if (!$this->tabeltitikwisata->save($data)) {
            return redirect()->to(base_url('home/edit_data'))
                ->with(
                    'message',
                    array(
                        'type' => 'danger',
                        'content' => 'Data gagal diedit'
                    )
                );
        }

        return redirect()->to(base_url('home/tabel'))
            ->with(
                'message',
                array(
                    'type' => 'success',
                    'content' => 'Data berhasil diedit'
                )
            );
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function tabeldb()
    {
        $data['dataobjek'] = $this->tabeltitikwisata->findAll();

        return view('v_tabeldb', $data);
    }
    public function input()
    {
        return view('v_input');
    }
    public function simpan_tambah_data()
    {
        if (isset($_POST['wisata'])) {
            $data['wisata'] = $_POST['wisata'];
        } else {
            $data['wisata'] = null;
        }
        $data = [
            'nama' => $_POST['wisata'],
            'deskripsi' => $_POST['deskripsi'],
            'alamat' => $_POST['alamat'],
            'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'htm' => $_POST['htm'],
            'jenis' => $_POST['jenis'],
        ];

        if (!$this->tabeltitikwisata->save($data)) {
            return redirect()->to(base_url('home/input'))
                ->with(
                    'message',
                    array(
                        'type' => 'danger',
                        'content' => 'Data gagal disimpan'
                    )
                );
        }
        return redirect()->to(base_url('home/input'))
            ->with(
                'message',
                array(
                    'type' => 'success',
                    'content' => 'Data berhasil disimpan'
                )
            );
    }
    public function test()
    {
        if (auth()->loggedIn()) {
            echo "User Sudah Login";
        } else {
            echo "User Belum Login";
        }
    }
}
