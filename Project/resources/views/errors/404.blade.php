@extends ('navigationbar')

@section('content')
<--div class="user">
<div class="container" id="container-users">
   <div class="row">
      <div class="user-item">
         <div class="down-content">
            <h1 class="center">Looks Like The Page you are looking for got destroyed by Space Invadors! Take revenge on them!<br><br></h1>
            <p class="center">
               <br/> Use <span class="label label-danger">Space</span> to shoot and 
               <span class="label label-danger">←</span>&#160;<span class="label label-danger">→</span> to move!&#160;&#160;&#160;<button class="btn btn-default btn-xs" id="restart">Restart</button>
            </p>
            <canvas id="space-invaders"/>
         </div>
      </div>
   </div>
</div>
</div>
<script src="/assets/js/404.js"></script>

@endsection ('content')
