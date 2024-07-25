<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>{{ $page }}</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Layanan</th>
                <th>Pengaju</th>
                <th>Status</th>
                <th>Total</th>
                {{-- <th>Per Minggu</th>
                <th>Per Bulan</th>
                <th>Per Tahun</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($Laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jenis_jasa }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->total }}</td>
                    {{-- <td>{{ $item->total_perminggu }}</td>
                    <td>{{ $item->total_perbulan }}</td>
                    <td>{{ $item->total_pertahun }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
