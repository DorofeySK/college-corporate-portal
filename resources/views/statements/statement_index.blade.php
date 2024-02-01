@extends('layouts.general')
@section('title', 'Профиль')

@section('left_part')
<div id="statement_table" class="w-full h-full overflow-scroll scrollbar p-12">
    <h1 class="w-full text-center mb-6">Таблица выплат</h1>
    <div class="grid grid-cols-2 md:w-1/2 gap-2 mb-6 ">
        <label class="border-b border-black">Список отображаемых заявлений</label>
        <select v-model="vision_mode">
            <option selected>Показывать все</option>
        @foreach (config('statementstates') as $state => $name)
            <option>{{ $name }}</option>
        @endforeach
        </select>
        <label class="border-b border-black">Начальная дата</label>
        <input v-model="from_date" type="date" class="border-b border-black">
        <label class="border-b border-black">Конечная дата</label>
        <input v-model="to_date" type="date" class="border-b border-black">
        <label class="border-b border-black">Фильтр по</label>
        <select v-model="date_type">
            <option selected>Дата публикации</option>
            <option>Дата последнего обновления</option>
        </select>
        <a v-if="excel_button" type="button" href="{{ route('close.index', ['login' => $owner]) }}" class="p-2 border-b border-black hover:bg-black hover:text-white">Экспорт в Excel</a>
    </div>
    <table class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">Группа выплат</th>
                <th class="border border-slate-600 p-4">Тип выплаты</th>
                <th class="border border-slate-600 p-4">Критерий выплаты</th>
                <th class="border border-slate-600 p-4">Самооценка</th>
                <th class="border border-slate-600 p-4">Итоговая оценка</th>
                <th class="border border-slate-600 p-4">Период выплаты</th>
                <th class="border border-slate-600 p-4">Подтверждающий документ</th>
                <th class="border border-slate-600 p-4">Проверяющий</th>
                <th class="border border-slate-600 p-4">Дата публикации</th>
                <th class="border border-slate-600 p-4">Последнее обновление</th>
                <th class="border border-slate-600 p-4">Статус</th>
                <th class="border border-slate-600 p-4">Редактировать</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="statement in statements_filter">
                <td class="border border-slate-600 p-4">@{{ statement.name }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.type }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.crit }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.amount }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.main_amount }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.period }}</td>
                    <td class="border border-slate-600 p-4">
                        <a v-for="doc in statement.docs" :href="doc.path">@{{ doc.name }}</a>
                    </td>
                    <td class="border border-slate-600 p-4">@{{ statement.checker }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.pub_date }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.update_date }}</td>
                    <td class="border border-slate-600 p-4">@{{ statement.state }}</td>
                    <td class="border border-slate-600 p-4">
                        <a v-if="statement.update_posible" type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" :href="statement.edit_href">Редактировать</a>
                        <p v-else>Уже учтен</p>
                    </td>
            </tr>
            {{-- @foreach ($table as $row)
                <tr>
                    <td class="border border-slate-600 p-4">{{ $row['payment']->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment']->type }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['payment_detail']->name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->amount }} ({{ config('amounttype.' . $row['payment_detail']->amount_type) }})</td>
                    <td class="border border-slate-600 p-4">{{ config('period.' . $row['payment_detail']->period) }}</td>
                    <td class="border border-slate-600 p-4">
                        @foreach ($row['docs'] as $doc)
                            {{ $doc->name }}<br><a href="/storage/{{ $doc->owner_login }}/{{ $doc->name }}">Скачать файл</a>
                        @endforeach
                    </td>
                    <td class="border border-slate-600 p-4">{{ $row['checker']->first_name }} {{ $row['checker']->second_name }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->publication_day }}</td>
                    <td class="border border-slate-600 p-4">{{ $row['statement']->update_day }}</td>
                    <td class="border border-slate-600 p-4">{{ config('statementstates.' . $row['statement']->state) }}</td>
                    <td class="border border-slate-600 p-4">
                        @if ($row['statement']->state != 'used')
                            <a type="button" class="p-2 border-b border-black hover:bg-black hover:text-white" href="{{ route('statements.edit', ['id' => $row['statement']->id]) }}">Редактировать</a>
                        @else
                            Уже учтен
                        @endif
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
<script type="module">
    createApp({
        data() {
            return {
                from_date: '',
                to_date: '',
                date_type: 'Дата публикации',
                vision_mode: 'Показывать все',
                main_checker: {{ $is_owner == false && in_array('main_checker', $current_user->getRoles()) ? 1 : 0 }},
                statements_lst: [
                @foreach ($table as $row)
                {
                    name: "{{ $row['payment']->name }}",
                    type: "{{ $row['payment']->type }}",
                    crit: "{{ $row['payment_detail']->name }}",
                    amount: "{{ $row['statement']->amount }} ({{ config('amounttype.' . $row['payment_detail']->amount_type) }})",
                    main_amount: "{{ $row['statement']->main_amount }}",
                    period: "{{ config('period.' . $row['payment_detail']->period) }}",
                    docs: [
                    @foreach ($row['docs'] as $doc)
                    {
                        name: "{{ $doc->name }}",
                        path: "/storage/{{ $doc->owner_login }}/{{ $doc->name }}"
                    }
                    @endforeach
                    ],
                    checker: "{{ $row['checker']->first_name }} {{ $row['checker']->second_name }}",
                    pub_date: "{{ $row['statement']->publication_day }}",
                    update_date: "{{ $row['statement']->update_day }}",
                    state: "{{ config('statementstates.' . $row['statement']->state) }}",
                    update_posible: "{{ $row['statement']->state }}" != 'close',
                    edit_href: "{{ route('statements.edit', ['id' => $row['statement']->id]) }}",
                },
                @endforeach
                ],
            }
        },
        methods: {

        },
        computed: {
            statements_filter: function() {
                let buf_lst = [];
                if (this.vision_mode == 'Показывать все') {
                    buf_lst = this.statements_lst;
                } else {
                    buf_lst = this.statements_lst.filter(statement => statement.state == this.vision_mode);
                }
                if (this.from_date != '') {
                    buf_lst = buf_lst.filter(statement =>
                        (Date.parse(statement.update_date) >= Date.parse(this.from_date) && this.date_type == 'Дата последнего обновления') ||
                        (Date.parse(statement.pub_date) >= Date.parse(this.from_date) && this.date_type == 'Дата публикации')
                    );
                }
                if (this.to_date != '') {
                    buf_lst = buf_lst.filter(statement =>
                        (Date.parse(statement.update_date) <= Date.parse(this.to_date) && this.date_type == 'Дата последнего обновления') ||
                        (Date.parse(statement.pub_date) <= Date.parse(this.to_date) && this.date_type == 'Дата публикации')
                    );
                }
                return buf_lst;
            },
            excel_button: function() {
                let used_statements = this.statements_lst.filter(statement => statement.state == 'Учтен');
                return this.main_checker && used_statements.length > 0;
            }
        }
    }).mount('#statement_table');
</script>
@endsection('left_part')
