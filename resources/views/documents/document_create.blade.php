@extends('layouts.general')
@section('title', 'Загрузить документ')

@section('left_part')
<div id="load_doc" class="w-full h-full flex flex-col justify-center">
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="w-full p-8 flex flex-col space-y-4 items-center">
        @csrf
        <input @change="selectFile" class="w-1/2 p-2 border-b border-black hover:bg-black hover:text-white" type="file" ref="file" id="new_file" name="new_file">
        <p v-if="filesize_alert" style="color: red">Файл не должен превышать 15Мб</p>
        <input :disabled="!file_selected || filesize_alert" type="submit" value="Загрузить" class="p-2 border-b border-black hover:bg-black hover:text-white disabled:opacity-50">
    </form>
    <div class="w-full h-full overflow-scroll scrollbar p-12 divide-y-2 text-2xl space-y-2">
        @foreach($docs as $doc)
            <p>{{ $doc->name }} (<a href="/storage/{{ $doc->owner_login }}/{{ $doc->name }}">Скачать файл</a>/<a href="{{ route('documents.show', ['id' => $doc->id]) }}">Просмотр документа</a>)</p>
        @endforeach
    </div>
</div>
<script type="module">
    createApp({
        data() {
            return {
                file_selected: false,
                filesize_alert: false
            }
        },
        methods: {
            selectFile(e) {
                this.file_selected = true;
                const file = this.$refs.file.files[0];
                if (file.size > 15 * 1024 * 1024) {
                    this.filesize_alert = true;
                } else {
                    this.filesize_alert = false;
                }
            }
        }
    }).mount('#load_doc');
</script>
@endsection('left_part')
