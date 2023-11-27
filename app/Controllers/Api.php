<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Tabeltitikwisata;

class Api extends ResourceController
{
    protected $tabeltitikwisata;

    public function __construct()
    {
        $this->tabeltitikwisata = new Tabeltitikwisata();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $dataobjek = $this->tabeltitikwisata->findAll();

        $feature = array();

        foreach ($dataobjek as $q) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        floatval($q['longitude']),
                        floatval($q['latitude']),
                    ]
                ],
                'properties' => [
                    'gid' => $q['gid'],
                    'wisata' => $q['wisata'],
                    'alamat' => $q['alamat'],
                    'htm' => $q['htm'],
                    'jenis' => $q['jenis'],
                    'deskripsi' => $q['deskripsi'],
                    'foto' => $q['foto'],
                ]
            ];
        }

        $geojson = array(
            'type'      => 'FeatureCollection',
            'features'  => $feature
        );

        return $this->respond($geojson);
    }

    // public function polyline()
    // {
    //     $db = db_connect();
    //     $query = $db->query("SELECT gid, ST_AsGeoJSON(geom) AS geom, remark FROM jalan_ln_25k");
    //     $query_array = $query->getResultArray();
    //     $feature = array();
    //     foreach ($query_array as $q) {
    //         $feature[] = [
    //             'type' => 'Feature',
    //             'geometry' => json_decode($q['geom']),
    //             'properties' => [
    //                 'gid' => $q['gid'],
    //                 'remark' => $q['remark'],
    //             ]
    //         ];
    //     }
    //     $geojson = array(
    //         'type' => 'FeatureCollection',
    //         'features' => $feature
    //     );
    //     // header allow origin
    //     header('Access-Control-Allow-Origin: *');
    //     header('Content-Type: application/json');
    //     return $this->respond($geojson);
    // }


    public function polygon()
    {
        $db = db_connect();
        $query = $db->query("SELECT gid, ST_AsGeoJSON(geom) AS geom, name_2, name_3, type_3 FROM kp");
        $query_array = $query->getResultArray();
        $feature = array();
        foreach ($query_array as $d) {
            $feature[] = [
                'type' => 'Feature',
                'geometry' => json_decode($d['geom']),
                'properties' => [
                    'gid' => $d['gid'],
                    'name_2' => $d['name_2'],
                    'name_3' => $d['name_3'],
                    'type_3' => $d['type_3'],      
                ]
            ];
        }
        $geojson = array(
            'type' => 'FeatureCollection',
            'features' => $feature
        );
        // header allow origin
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        return $this->respond($geojson);
    }
}
