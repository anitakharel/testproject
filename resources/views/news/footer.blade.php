<!------scripts-------->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

<script src="{{ asset('fileinput/plugins/canvas-to-blob.min.js') }}"></script>
 
<script src="{{ asset('fileinput/plugins/sortable.min.js') }}"></script>
 
<script src="{{ asset('fileinput/plugins/purify.min.js') }}"></script>
 
<script src="{{ asset('fileinput/fileinput.min.js') }}"></script>
 
<script src="{{ asset('fileinput/themes/fa/theme.js') }}"></script>
 
<script src="{{ asset('fileinput/fileinput.script.js') }}"></script>

<script src="{{ asset('js/script.js') }}"></script>
<script>
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
    </body>
</html>