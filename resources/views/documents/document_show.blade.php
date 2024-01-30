@extends('layouts.general')
@section('title', 'Загрузить документ')

@section('left_part')
<div id="document_div" class="w-full flex justify-center">
    <embed src="/storage/{{ $document->owner_login }}/{{ $document->name }}" class="md:w-1/2 w-11/12 md:h-[900px] h-[300px]" :type="doc_type">
</div>

<script type="module">
    createApp({
        data() {
            return {
                name: "{{ $document->name }}",
                owner: "{{ $document->owner_login }}",
            }
        },
        computed: {
            doc_type: function() {
                let splited_name = this.name.split('.');
                let type = splited_name[splited_name.length - 1];
                const types = {
                    'doc' : 'application/msword',
                    'docx' : 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'jpeg' : 'image/jpeg',
                    'jpg' : 'image/jpeg',
                    'png' : 'image/png',
                    'pdf' : 'application/pdf'
                };
                console.log(types[type]);
                return types[type];
            }
        }
    }).mount('#document_div');
</script>
@endsection('left_part')
