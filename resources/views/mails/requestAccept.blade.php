<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Saira+Semi+Condensed:wght@500&display=swap" rel="stylesheet">

<style>
    .iconoImg{
      width:25px;
    }
    body{
      font-family: 'Saira Semi Condensed', sans-serif;
    }
  </style>
  
          <script type="text/javascript" src="/js/qrcode.js"></script>
    <div class="card">
      <div class="card-body">
        
        <br><br>
        <div class="despegar" style="font-size: 20px;">
         

            <b>Hola,</b> <b> {{ $name}}</b>:<br/>
            <div>Tu solicitud al proyecto {{ $project }} fue aceptada</div> <br>
            <div>Si quieres ver la información de tu nuevo equipo puedes entrar a my-project a la seccion de team</div>
          </div>
        <br>
          <div class="text-justify despegar">
            {{-- {{ __('messages.TKS1') }}
            {{ __('messages.DateE1') }} --}}
          
          </div>
        <div class="text-justify despegar">
            
            {{-- <a href="https://aws.expertosenconvenciones.com/quotes/{{$id}}">Puede ver las citas aceptadas en este enlace</a> --}}
              {{-- @if ($referencia != 1 )
              <br>
              <a href="{{ $referencia }}">{{ __('messages.LinkE1') }}</a>
              <br>
              @endif --}}
            
              <br>
              {{-- <div>{{ __('messages.DetailsE1') }}</div> --}}

            <br>
          <div>
           Redes sociales<br>
            <br>
              
              <a href="https://www.facebook.com/EMEXAC/"><img src="https://aws.expertosenconvenciones.com/img/mango/iconofacebook.png" class='iconoImg' width="25px"></a> &nbsp;&nbsp;&nbsp;
              
              <a href="https://www.instagram.com/mangoemex/"><img src="https://aws.expertosenconvenciones.com/img/mango/iconoinstagram.png" class='iconoImg'  width="25px"></a>&nbsp;&nbsp;&nbsp;
            
              <a href="https://twitter.com/EMEXAC"><img src="https://aws.expertosenconvenciones.com/img/mango/iconotwiter.png" class='iconoImg'  width="25px"></a>&nbsp;&nbsp;&nbsp;
              
              <a href="https://api.whatsapp.com/send/?phone=523310261383&app_absent=0/"><img src="https://aws.expertosenconvenciones.com/img/mango/iconowhats.png" class='iconoImg'  width="25px"></a>&nbsp;&nbsp;&nbsp;

            <br>
            <br>
            
          </div>
        </div>
     
      </div>
    </div>

  <style>
    .col-md-6{
      width: 286px;
      height: 120px;
    }
    
    .iconoImg{
      width:25px;
    }
    .despegar{
      margin-left: 20px;
    }
    .despegar2{
      margin-left: 13px;
    }
    .card{
      padding: 5px 30px;
      margin: 50px 200px;
      background-color: #f6f6f6;
    }


  </style>