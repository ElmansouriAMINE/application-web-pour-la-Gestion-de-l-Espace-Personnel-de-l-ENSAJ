<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérifiez votre adresse e-mail</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                       </div>
                   @endif
                   <a href="{{ url('/reset-password/'.$token) }}">Cliquez ici</a>
               </div>
           </div>
       </div>
   </div>
</div>
