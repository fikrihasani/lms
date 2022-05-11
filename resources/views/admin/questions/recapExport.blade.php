<table>
    <thead>
        <tr>
            <th rowspan=2>Nama Lengkap</th>
            <th rowspan=2>Sekolah</th>
            <th rowspan=2>Kelas</th>
            @for ($idx = 1; $idx <= 11; $idx++)
            <th colspan=5>Soal no {{$idx}}</th>
            @endfor
        </tr>
        <tr>
            @for ($idx = 1; $idx <= 11; $idx++)
            <th>Soal</th>
            <th>Alasan</th>
            <th>Degree</th>
            <th>Kategori</th>
            <th>Skor</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach ($answer as $row)
        <tr>
            <td>
                {{$row["nama_lengkap"]}}
            </td>
            <td>
                {{$row["sekolah"]}}
            </td>
            <td>
                {{$row["kelas"]}}
            </td>
            @for ($idx = 1; $idx < 12; $idx++)
                <td>
                    {{$row["soal_".$idx]}}
                </td>
                <td>
                    {{$row["alasan_soal_".$idx]}}
                </td>
                <td> 
                    {{$row["keyakinan_soal_".$idx]}}
                </td>
                <td>
                    {{$row["kategori_".$idx]}}
                </td>
                <td>
                    {{$row["skor_".$idx]}}
                </td>
            @endfor
        </tr>
        @endforeach
    </tbody>
</table>
