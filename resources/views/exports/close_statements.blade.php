<table>
    <thead>
        <tr>
            <th>Выплата</th>
            <th>Критерий оценки</th>
            <th>Размер выплаты</th>
            <th>Самооценка</th>
            <th>Оценка администрации</th>
            <th>Итоговая оценка</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($statements as $statement)
        <tr>
            <td>{{ App\Models\Payment::where('id', $statement->payment_id)->first()->name }}</td>
            <td>{{ App\Models\PaymentDetail::where('id', $statement->paymentdetail_id)->first()->name }}</td>
            <td>{{ App\Models\PaymentDetail::where('id', $statement->paymentdetail_id)->first()->amount }}</td>
            <td>{{ $statement->amount }}</td>
            <td>{{ $statement->middle_amount }}</td>
            <td>{{ $statement->main_amount }}</td>
        </tr>
        @endforeach
        <tr>
            <td>Итог</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $statements->sum('main_amount') }}</td>
        </tr>
    </tbody>
</table>
