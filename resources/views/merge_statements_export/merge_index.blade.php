@extends('layouts.general')
@section('title', 'Общий экспорт в Excel')

@section('left_part')
<div id="merge_table" class="w-full h-full overflow-scroll scrollbar p-12">
    <div class="grid grid-cols-2 md:w-1/2 gap-2 mb-6 ">
        <label class="border-b border-black">Начальная дата</label>
        <input v-model="from_date" type="date" class="border-b border-black">
        <label class="border-b border-black">Конечная дата</label>
        <input v-model="to_date" type="date" class="border-b border-black">
    </div>
    <p v-if="months.length != 3" class="text-red-800">Необходимо указать трехмесячный диапазон</p>
    <button @click="exportExcel()" v-if="months.length == 3" class="p-2 border-b border-black hover:bg-black hover:text-white">Экспорт в Excel</button> 
    <h1 v-if="months.length == 3" class="w-full text-center mb-6">Экспортируемая таблица</h1>
    <table id="exportingTable" v-if="months.length == 3" class="table-auto border border-collapse border-black border-spacing-10">
        <thead>
            <tr>
                <th class="border border-slate-600 p-4">ФИО</th>
                <th class="border border-slate-600 p-4">Должность</th>
                <th class="border border-slate-600 p-4">Пункты @{{ months != undefined ? months[0] : "<не выбран>" }}</th>
                <th class="border border-slate-600 p-4">Количество баллов</th>
                <th class="border border-slate-600 p-4">Пункты @{{ months != undefined ? months[1] : "<не выбран>" }}</th>
                <th class="border border-slate-600 p-4">Количество баллов</th>
                <th class="border border-slate-600 p-4">Пункты @{{ months != undefined ? months[2] : "<не выбран>" }}</th>
                <th class="border border-slate-600 p-4">Количество баллов</th>
                <th class="border border-slate-600 p-4">За три месяца<br/>Пункты</th>
                <th class="border border-slate-600 p-4">Количество баллов всего</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="info in infos">
                <td class="border border-slate-600 p-4">@{{ info.name }}</td>
                <td class="border border-slate-600 p-4">@{{ info.job }}</td>
                <td class="border border-slate-600 p-4">@{{ info[months[0]].statements.length > 0 ? info[months[0]].statements.join() : '-' }}</td>
                <td class="border border-slate-600 p-4">@{{ info[months[0]].month_value }}</td>
                <td class="border border-slate-600 p-4">@{{ info[months[1]].statements.length > 0 ? info[months[1]].statements.join() : '-' }}</td>
                <td class="border border-slate-600 p-4">@{{ info[months[1]].month_value }}</td>
                <td class="border border-slate-600 p-4">@{{ info[months[2]].statements.length > 0 ? info[months[2]].statements.join() : '-' }}</td>
                <td class="border border-slate-600 p-4">@{{ info[months[2]].month_value }}</td>
                <td class="border border-slate-600 p-4">@{{ 
                    info[months[0]].statements.length > 0 || info[months[1]].statements.length > 0 || info[months[2]].statements.length > 0 ?
                    info[months[0]].statements.concat(info[months[1]].statements.concat(info[months[2]].statements)).join() : 
                    '-' 
                }}</td>
                <td class="border border-slate-600 p-4">@{{ info.total_value }}</td>
            </tr>
        </tbody>
    </table>
</div>

<script type="module">
    createApp({
        data() {
            return {
                from_date: undefined,
                to_date: undefined,
                infos: undefined,
                months: [],
            }
        },

        watch: {
            from_date: function(newVal, oldVal) {
                console.log(oldVal, newVal);
                if (this.from_date != undefined && this.to_date != undefined) {
                    this.getRs();
                }
            },
            to_date: function(newVal, oldVal) {
                console.log(oldVal, newVal);
                if (this.from_date != undefined && this.to_date != undefined) {
                    this.getRs();
                }
            }
        },

        methods: {
            getRs: function() {
                if (this.from_date.length == 0 || this.to_date.length == 0) {
                    this.infos = undefined;
                }
                axios.get("{{ route('merge.get_merged') }}", {
                    params: {
                        'login': '{{ $current_user->login }}',
                        'hash': '{{ $current_user->password }}',
                        'from_date': this.from_date,
                        'to_date': this.to_date
                    }
                }).then((rs) => { 
                    this.infos = rs.data.infos;
                    this.months = rs.data.months;
                    console.log(this.infos);
                    console.log(this.months);
                });
            },
            exportExcel: function() {
                axios.get("{{ route('merge.download') }}", {
                    responseType: 'blob',
                    params: {
                        'login': '{{ $current_user->login }}',
                        'hash': '{{ $current_user->password }}',
                        'from_date': this.from_date,
                        'to_date': this.to_date
                    }
                }).then((rs) => {
                    const href = URL.createObjectURL(rs.data);
                    const link = document.createElement('a');
                    link.href = href;
                    link.setAttribute('download', 'Сводный график.xlsx');
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    URL.revokeObjectURL(href);
                });
            }
        }
    }).mount("#merge_table");
</script>
@endsection('left_part')
