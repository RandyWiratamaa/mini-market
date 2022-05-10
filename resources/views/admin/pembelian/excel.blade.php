<table>
    <thead>
        <tr>
            <th>No. Faktur</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>PPN</th>
            <th>Tagihan</th>
        </tr>
    </thead>
    <tbody>
        <tbody>
            <?php //$total = 0;?>
            @foreach ($pembelian as $beli)
            <?php //$total += $beli->tagihan_beli ?>
            <tr>
                <td>{{ $beli->no_faktur }}</td>
                <td>{{ $beli->created_at}}</td>
                <td>{{$beli->total_beli}}</td>
                <td>{{$beli->ppn_beli}}</td>
                <td>{{$beli->tagihan_beli}}</td>
            </tr>
            @endforeach
        </tbody>
    </tbody>
</table>