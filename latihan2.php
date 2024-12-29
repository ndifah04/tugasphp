<?php 
    
    $jsonname = "latihan2.json";
    if(!file_exists($jsonname)) {
        file_put_contents($jsonname, json_encode([]));
    }

    class User {

        public string $nama;
        public string $jenis_kelamin;
        public int $umur;

        function __construct(string $nama, string $jenis_kelamin, int $umur) {
            
            $this->nama = $nama;
            $this->jenis_kelamin = $jenis_kelamin;
            $this->umur = $umur;

        }
    }

    /**
     * Mendapatkan data-data User dari latihan2.json
     * @return User[]
     */
    function getData() : array {
        global $jsonname;
        return json_decode(file_get_contents($jsonname), true);
    }

    function addData( User $data ) {
        global $jsonname;
        $datas = getData();


        //menambah data/element ke dalam Array
        $datas[] = [
            "nama" => $data->nama,
            "jenis_kelamin" => $data->jenis_kelamin,
            "umur" => $data->umur
        ];

        file_put_contents($jsonname, json_encode($datas));
    }

    function editData( int $id, User $data  ) {
        global $jsonname;
        $datas = getData();

        //mengganti data dari index $id 
        $datas[$id] = [
            "nama" => $data->nama,
            "jenis_kelamin" => $data->jenis_kelamin,
            "umur" => $data->umur
        ];

        file_put_contents($jsonname, json_encode($datas));
    }

    function deleteData( int $id ) {
        global $jsonname;
        $datas = getData();

        //menghapus data dari index $id
        unset($datas[$id]);

        file_put_contents($jsonname, json_encode($datas));
    }


