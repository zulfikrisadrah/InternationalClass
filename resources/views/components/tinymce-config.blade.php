<script src="https://cdn.tiny.cloud/1/6m74wjjdn92lq675hlvhv7ysh9qeycnb56403gjzt0fhbp62/tinymce/7/tinymce.min.js"
  referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#News_Content, textarea#Event_Content, textarea#program_description',
    width: '100%',
    height: 400,
    plugins: 'code table lists image insertdatetime advlist autolink charmap preview anchor pagebreak searchplace wordcount visualblocks fullscreen media template',
    toolbar: 'undo redo | link image | blocks | bold italic underline | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>


<script>
  document.querySelector('form').addEventListener('submit', function () {
    tinymce.triggerSave(); // Simpan konten editor ke textarea
  });
</script>
