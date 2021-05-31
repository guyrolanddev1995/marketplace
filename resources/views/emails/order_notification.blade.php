@extends('emails.template')

@section('content')
<table role="presentation" bgcolor="#f6fafb" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td style="padding: 20px 0 30px 0;">
        <table align="center" border="0" bordercolor="#f6fafb" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
            <tr>
                <td align="center" style="padding: 40px 0 30px 0;">
                <img src="{{ asset('frontend/img/logo.jpeg') }}" alt="" width="200px" height="90px">
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff" style="padding: 25px 30px 40px 30px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0px 0;">
                                <p style="margin: 0;">
                                    <strong>Bonjour</strong>, Mr/Mll {{ $order->nom }} {{ $order->prenom }}
                                </p>
                                <p>
                                    Votre commande a été prise en compte.
                                </p> 
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 15px 0 0px 0;">
                                <p>
                                    Détail de votre commande.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                        Nom:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->nom }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Prenom:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->prenom }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Téléphone:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->phone1 }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Adresse de livraison:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->adresse }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Pays:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->country->nicename }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Ville:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->ville }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Code postal:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->code_postal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Transporteur:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->transporteur->nom }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Délais de livraison:
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->transporteur->delais }} Jours
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" width="40%" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            Frais de livraison(/kg):
                                        </td>
                                        <td valign="top" style="color: #153643; font-family: Arial, sans-serif; font-size: 15px; line-height: 17px; padding: 3px 0 5px 0;">
                                            {{ $order->transporteur->frais }} CFA
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding-top: 20px">
                                <table border="1" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; border: 1px solid">
                                        <tr>
                                            <td bgcolor="#bbc0c8" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 10px 0 10px 0">
                                                Article
                                            </td>
                                            <td bgcolor="#bbc0c8" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 10px 0 10px 0">
                                                Prix unitaire
                                            </td>
                                            <td bgcolor="#bbc0c8" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 10px 0 10px 0">
                                                Quantité
                                            </td>
                                            <td bgcolor="#bbc0c8" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 10px 0 10px 0">
                                                Total
                                            </td>
                                        </tr>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 5px 0 5px 0">
                                                    {{ $product->name }}
                                                </td>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 5px 0 5px 0">
                                                    {{ $product->price }} CFA
                                                </td>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 5px 0 5px 0">
                                                    {{ $product->pivot->quantity }}
                                                </td>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; text-align:center; padding: 5px 0 5px 0">
                                                   {{  $product->pivot->total_price }} CFA
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding-top: 20px">
                                <table border="0" cellpadding="0" cellspacing="0" width="70%" style="border-collapse: collapse;">
                                        <tr>
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; padding: 5px 0 5px 0">
                                                Sous-total:
                                            </td>
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; padding: 5px 0 5px 0">
                                                {{ $order->amount }} CFA
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; padding: 5px 0 5px 0">
                                                Frais de livraison:
                                            </td>
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; padding: 5px 0 5px 0">
                                                {{ $order->frais_livraison }} CFA
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; padding: 5px 0 5px 0">
                                                Total:
                                            </td>
                                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; padding: 5px 0 5px 0">
                                                {{ $order->amount +  $order->frais_livraison }} CFA
                                            </td>
                                        
                                        </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 0px 0;">
                            <p>
                                Vous recevrez un email après validation de votre commande.
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