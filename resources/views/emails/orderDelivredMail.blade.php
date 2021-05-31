@extends('emails.template')

@section('content')
<table role="presentation" bgcolor="#f6fafb" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td style="padding: 20px 0 30px 0;">
        <table align="center" border="0" bordercolor="#f6fafb" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
            <tr>
                <td align="center" style="padding: 40px 0 30px 0;">
                <img src="{{ asset('frontend/img/logo.jpeg') }}" alt="" width="190px" height="90px">
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 25px 30px 40px 30px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0px 0;">
                                <p>
                                   <h3><strong>Suivi de votre commande</strong></h3>
                                </p> 
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 5px 0 0px 0;">
                                Bonjour, Mr/Mll <strong>{{ $order->nom }} {{ $order->prenom }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 5px 0 0px 0;">
                                <p>
                                    Votre colis est a present disponible. <br> 
                                    Rendez-vous en agence pour le retrait de votre colis.
                                </p> 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 30px 30px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="color:#153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center">
                                <p style="margin: 0;">&reg; Someone, somewhere 2025<br/>
                                <a href="#" style="color:#153643;">Unsubscribe</a> to this newsletter instantly</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
      </td>
    </tr>
  </table>
@endsection