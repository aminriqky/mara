<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemberitahuan Mara</title>
    <style>
        body {
            background-color:#bdc3c7;
            margin:0;
        }
        .card {
            background-color:#fff;
            padding:20px;
            margin:20%;
            text-align:center;
            margin:0px auto;
            width: 580px; 
            max-width: 580px;
            margin-top:10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        img {
            width: 50px;
            height: 50px;
        }

        .garis {
            width: 75%;
        }

        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 50%;
            border: 1px solid #f2f5f7;
        }
         
        .table1 tr th{
            background: #35A9DB;
            color: #fff;
            font-weight: normal;
        }
         
        .table1, th, td {
            padding: 8px 20px;
            text-align: center;
        }
         
        .table1 tr:hover {
            background-color: #f5f5f5;
        }
         
        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h3 class="">Halo {{$name}} ! ada {{$ground2}} daerah yang berpotensi tanah longsor !</h3>
        <hr class="garis">
        <p>Telah terjadi pergeseran tanah di beberapa lokasi di Sumatera selatan. Berikut ini list daerah tersebut.</p>
        <table class="table1">
            <tr>
                <th>No</th>
                <th>Nama Lokasi</th>
                <th>Pergeseran horizontal</th>
                <th>Pergeseran vertikal</th>
            </tr>
            <?php $i=1; ?>
            @foreach($ground as $gr)
                <tr>
                    <td><?=  $i; $i++; ?></td>
                    <td>{{$gr->nama_lokasi}}</td>
                    <td>{{$gr->horizontal}} cm</td>
                    <td>{{$gr->vertikal}} cm</td>
                </tr>
            @endforeach
        </table>
        <h4>Harap berhati hati pada saat melewati daerah tersebut</h4>
    </div>
</body>
</html>