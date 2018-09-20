<!DOCTYPE html>
<html>
  <head>
    <title>Verify email</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/mail.css')}}">
  </head>
  <body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td align="center">
              <img src="{{asset('img/visumo_black.png')}}" class="nav_logo">
          </td>
      </tr>
      <tr>
        <td align="center">
          <h1>Oeps! {{$userdata['name']}} je bent nog niet klaar</h1>
          <p>Uw email is nog niet geverifieerd.</p>
          <a href="https://ramonbers.nl/admin/user/verify/{{$userdata['verify_token']}}">Doe dit nu!</a>
          <p>Mocht de link niet werken, hier is de verificatie code: <b>{{$userdata['verify_token']}}</b></p>
          <br>
          <br>
          <p>Deze mail is bestemd voor: <b>{{$userdata['email']}}</b></p>
        </td>
      </tr>
    </table>
  </body>
</html>
