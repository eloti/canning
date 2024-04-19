<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<title>Contactar a DHTeam</title>

  <head>
    @include('inc._head')
  </head>

  <body>
    @include('inc._navbar')
      <main>
        <div class="container">

          <div class="row">
            <div class="col-sm-12">
                <div class="eagle-jumbotron">
                    <h3 class="eagle-h3" style="color: black; line-height: 160%; text-align: center">Comuníquese con <strong>RentalPaas</strong></h3>
                </div>
            </div>
          </div>

        <br>

        <form method="POST" action="{{ route('contact.store') }}">
          {{ csrf_field() }}

        <div class="row contact_blade_body">

          <div class="col-0 col-sm-1 col-md-2 col-lg-2 col-xl-2">
          </div>

          <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-8">


              <div class="form-group">
                <label>Nombre:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  @if ($errors->has('name'))
                    <small class="form-text invalid-feedback" style="display: block">{{ $errors->first('name') }}</small>
                  @endif
              </div>

              <div class="form-group">
                <label>E-mail:</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                  @if ($errors->has('email'))
                    <small class="form-text invalid-feedback" style="display: block">{{ $errors->first('email') }}</small>
                  @endif
              </div>

              <div class="form-group">
                <label>Mensaje:</label>
                <textarea class="form-control" name="message" rows="6"> {{ old('message') }}</textarea>
                  @if ($errors->has('message'))
                    <small class="form-text invalid-feedback" style="display: block">{{ $errors->first('message') }}</small>
                  @endif
              </div>

            </div>
          </div> <!-- end of body -->

          <div class="row contact_blade_footer">

            <div class="col-0 col-sm-1 col-md-2 col-lg-2 col-xl-2">
            </div>

            <div class="col-8 col-sm-5 col-md-4 col-lg-4 col-xl-4" style="font-family: 'Cairo', sans-serif">
              <b>Muchas gracias, le responderemos a la brevedad.</b>
            </div>
            <div class="col-4 col-sm-5 col-md-4 col-lg-4 col-xl-4" style="display: flex; justify-content: center; align-items: center">
              <a href="/" class="logo_container" style="display: flex; justify-content: center; padding: 0;">
                <img src="images/DHTeam-logo-rojo.png" alt="logo" class="logo" style="height: 2rem">
              </a>
            </div>

            <div class="col-0 col-sm-1 col-md-2 col-lg-2 col-xl-2">
            </div>

          </div> <!-- end of footer -->

          <br>

          <div class="row" style="display: flex; justify-content: center">
            <div class="eagle-button-container col-2">
              <a class="btn eagle-button-2" style="display: flex; flex-direction: column; justify-content: center; text-align: center;" href="{{ url()->previous() }}">Cancelar</a>
            </div>
            <div class="col-2"></div>
            <div class="eagle-button-container col-2">
              <button type="submit" class="btn eagle-button">Enviar</button>
            </div>
          </div>

        </form>
        <br>
      </div> <!-- end of container -->

      </main>
    @include('inc._footer')
    @yield('script')
  </body>

</html>
