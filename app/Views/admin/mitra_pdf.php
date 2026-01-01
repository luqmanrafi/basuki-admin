<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Mitra</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Laporan Data Mitra</h2>
    <p>Tanggal Cetak: <?= date('d M Y H:i:s') ?></p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Job</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Tgl. Bergabung</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($mitra) && is_array($mitra)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($mitra as $item) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= !empty($item['name']) ? esc($item['name']) : '-' ?></td>
                        <td><?= !empty($item['jobs']) ? esc($item['jobs']) : '-' ?></td>
                        <td><?= !empty($item['address']) ? esc($item['address']) : '-' ?></td>
                        <td><?= !empty($item['phone']) ? esc($item['phone']) : '-' ?></td>
                        <td><?= esc(date('d M Y', strtotime($item['created_at']))) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No mitra data found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>