<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<form>
  <div class="mb-3">
    <label for="prompt" class="form-label">Prompt</label>
    <input type="text" class="form-control" id="prompt" aria-describedby="emailHelp" name='prompt'>
  </div>
  
  <button type="button" class="btn btn-primary" id='btn'>Submit</button>
</form>

<p id='result'></p>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 

<script>
$(document).ready(function() {
  $('#btn').on('click', function (event) {
   
    event.preventDefault();
    const userInput = $('#prompt').val();

    $.ajax({
      url: "{{ route('ai.handlePrompt')}}", 
      type: 'POST',
      data: {
        text: userInput,
        _token: '{{ csrf_token() }}' 
      },
      success: function (data) {
        $('#result').html(data.reply); 
      },
      error: function (err) {
        console.error(err);
        $('#result').html('<p>Error occurred. Try again later.</p>');
      }
    });
  });
});
</script>