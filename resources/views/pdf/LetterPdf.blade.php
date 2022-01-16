<!DOCTYPE html>
<html>
  <head>
    <style>
      h2 {text-align: center;
          font-style: bold;}
      
    </style>
  </head>
  <body>
  
   <h2>Quarantine Notice Letter</h2>
   
   <h3>Quarantine Date End: {{ $endD }}</h3>
   <h3>Dear {{ $name }},</h3>
   <p>{{ $body }}</p>
   
   <footer>
     Thank you.<br><br>
     Sincerely, from Healthcare Authority.
   </footer>
   
  </body>
</html>