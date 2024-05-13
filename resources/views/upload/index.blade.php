<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload File') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 text-white">
            <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" style=" padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.15);">
                @csrf
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
                <input type="text" name="name" id="name" style="color: black; display: block; width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ddd;">
                <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
                <textarea name="description" id="description" style="color: black; display: block; width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ddd;"></textarea>
                <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">Image:</label>
                <input type="file" name="image[]" multiple id="image" style="display: block; margin-bottom: 10px;">
            </form>
            <div class="progress">
                <div class="progress-bar" style="width:0%; background:#28a745;"></div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
            url: "{{ route('upload.store') }}",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
            },
            error:function(){
                alert('Upload Failed!');
            },
            success:function(){
                alert('Upload Successful!');
            }
        });
    });
});
</script>
<script>
$(document).ready(function(){
    $('#image').on('change', function(){
        var form = $(this).closest('form');
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-bar").width(percentComplete + '%');
                        $(".progress-bar").html(percentComplete+'%');
                    }
                }, false);
                return xhr;
            },
            url: '{{ route('upload.store') }}',
            type: 'POST',
            data: new FormData(form[0]),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $(".progress-bar").width('0%');
            },
            error:function(){
                alert('Upload Failed!');
            },
            success:function(){
                alert('Upload Successful!');
            }
        });
    });
});
</script>