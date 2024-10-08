<table>
    <thead>
        <tr>
            <th>ФИО</th>
            <th>Должность</th>
            <th>Пункты {{ $months[0] }}</th>
            <th>Количество баллов</th>
            <th>Пункты {{ $months[1] }}</th>
            <th>Количество баллов</th>
            <th>Пункты {{ $months[2] }}</th>
            <th>Количество баллов</th>
            <th>За три месяца<br/>Пункты</th>
            <th>Количество баллов всего</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($infos as $info)
        <tr>
            <td>{{ $info['name'] }}</td>
            <td>{{ $info['job'] }}</td>
            <td>{{ count($info[$months[0]]['statements']) > 0 ? implode(', ', $info[$months[0]]['statements']) : '-' }}</td>
            <td>{{ $info[$months[0]]['month_value'] }}</td>
            <td>{{ count($info[$months[1]]['statements']) > 0 ? implode(', ', $info[$months[0]]['statements']) : '-' }}</td>
            <td>{{ $info[$months[1]]['month_value'] }}</td>
            <td>{{ count($info[$months[2]]['statements']) > 0 ? implode(', ', $info[$months[0]]['statements']) : '-' }}</td>
            <td>{{ $info[$months[2]]['month_value'] }}</td>
            <td>{{ 
                count($info[$months[0]]['statements']) > 0 || count($info[$months[1]]['statements']) > 0 || count($info[$months[2]]['statements']) > 0 ?
                implode(', ', array_merge($info[$months[0]]['statements'], $info[$months[1]]['statements'], $info[$months[2]]['statements'])) :
                '-' 
            }}</td>
            <td>{{ $info['total_value'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>