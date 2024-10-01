<!DOCTYPE html>
<html>
<head>
    <title>Multi Language Website with Laravel 9</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <h2>Multi Language Website with Laravel 9</h2>
        <hr>
        <div class="row">
         <div class="col-md-3"></div>
         
            <div class="col-md-6">
                <strong>Select Language: </strong>
                <select onchange="changeLanguage(this.value)">
                    <option {{session()->has('lang_code')?(session()->get('lang_code')=='en'?'selected':''):''}} value="en">English</option>

                    <option {{session()->has('lang_code')?(session()->get('lang_code')=='fr'?'selected':''):''}} value="fr">French</option>
                </select>
            </div>
        </div>
        <h4 class="mt-5">{{ __('messages.title') }}</h4>
    </div>
</body>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 
  function changeLanguage(lang)
  {
    window.location='{{url("change-language")}}/'+lang;
  }

</script>
</html>