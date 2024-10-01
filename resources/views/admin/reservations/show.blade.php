@extends('AdminHome')
@section('content')
<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">@lang('messages.INVOICE DETAILS')</h4>


</div>
</div>
</div>
<!-- end page title -->
@php
$company = App\Models\Company::all();
@endphp

<div class="row justify-content-center">
<div class="col-xxl-9">
<div class="card" id="demo">
<div class="row">
@foreach($company as $comp)
<div class="col-lg-12">
<div class="card-header border-bottom-dashed p-4">
<div class="d-flex">
<div class="flex-grow-1">
<img src="{{ Storage::url($comp->image) }}" class="card-logo card-logo-dark" alt="logo dark" height="47">
<img src="assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
<div class="mt-sm-5 mt-4">
<h6 class="text-muted text-uppercase fw-semibold">@lang('messages.Address')</h6>
<p class="text-muted mb-1" id="address-details"> <i class="ri-map-pin-fill"> </i>{{$comp->address}}</p>

</div>
</div>
<div class="flex-shrink-0 mt-sm-0 mt-3">
<h6><span class="text-muted fw-normal">@lang('messages.Owner'):</span><span id="legal-register-no">{{$comp->owner}}</span></h6>
<h6><span class="text-muted fw-normal">@lang('messages.Email'):</span><span id="email">{{$comp->email}}</span></h6>
<h6><span class="text-muted fw-normal">@lang('messages.Website'):</span> <a href="https://themesbrand.com/" class="link-primary" target="_blank" id="website">{{$comp->siteweb}}</a></h6>
<h6 class="mb-0"><span class="text-muted fw-normal">@lang('messages.Contact No'): </span><span id="contact-no"> +(213) {{$comp->phone}}</span></h6>
</div>
</div>
</div>
<!--end card-header-->
</div>
@endforeach<!--end col-->
<div class="col-lg-12">
<div class="card-body p-4">
<div class="row g-3">
<div class="col-lg-3 col-6">
<p class="text-muted mb-2 text-uppercase fw-semibold">@lang('messages.RESERVATION NO')</p>
<h5 class="fs-14 mb-0"><span id="invoice-no">{{$reservation->id}}</span></h5>
</div>
<!--end col-->
<div class="col-lg-3 col-6">
<p class="text-muted mb-2 text-uppercase fw-semibold">@lang('messages.DATE')</p>
<h5 class="fs-14 mb-0"><span id="invoice-date">{{$reservation->created_at}}</span></h5>
</div>
<!--end col-->
<div class="col-lg-3 col-6">
<p class="text-muted mb-2 text-uppercase fw-semibold">@lang('messages.Price')</p>
<span  id="payment-status">${{$reservation->price}}</span>
</div>
<!--end col-->
<div class="col-lg-3 col-6">
<p class="text-muted mb-2 text-uppercase fw-semibold">@lang('messages.Total Amount')</p>
<h5 class="fs-14 mb-0"><span class="badge badge-soft-success fs-11" id="total-amount">${{$reservation->penalty}}</span></h5>
</div>
<!--end col-->
</div>
<!--end row-->
</div>
<!--end card-body-->
</div><!--end col-->
<div class="col-lg-12">
<div class="card-body p-4 border-top border-top-dashed">
<div class="row g-3">
<div class="col-6">
<h6 class="text-muted text-uppercase fw-semibold mb-3">@lang('messages.USER INFORMATION')</h6>
<p class="mb-2"><b>@lang('messages.Name'):</b> {{$reservation->user->name}}</p>
<p class="mb-2"><b>@lang('messages.Birth Date'):</b> {{$reservation->user->birthDate}}</p>
<p class="mb-2"><b>@lang('messages.Gender'):</b> {{$reservation->user->gender}}</p>
<p class="mb-2" id="billing-name"><b>@lang('messages.Address'):</b> {{$reservation->user->address}}</p>
<p class="mb-2" id="billing-name"><b>@lang('messages.Email'): </b>{{$reservation->user->email}}</p>
<p class="mb-2" id="billing-name"><b>@lang('messages.Phone'): </b>{{$reservation->user->phone}}</p>
<p class="mb-2" id="billing-name"><b>@lang('messages.License ID'):</b> {{$reservation->user->IDLicense}}</p>
</div>
<!--end col-->
<div class="col-6">
<h6 class="text-muted text-uppercase fw-semibold mb-3">@lang('messages.RENTED VEHICULE INFORMATIONS')</h6>

<p class="mb-2">
<b>@lang('messages.The Rented Car') :</b> 
{{$reservation->vehicule->carName ?? 'Null'}}
</p>

<p class="mb-2"><b>@lang('messages.Category'):</b>{{$reservation->vehicule->category->brand ?? 'Null'}}</p>
<p class="mb-2"><b>@lang('messages.Color'):</b> {{$reservation->vehicule->color ?? 'Null'}}</p>
<p class="mb-2"><b>@lang('messages.Production Year'):</b> {{$reservation->vehicule->productionYear ?? 'Null'}}</p>
<p class="mb-2"><b>@lang('messages.Transmission'):</b> {{$reservation->vehicule->transmission ?? 'Null'}}</p>
<p class="mb-2"><b>@lang('messages.Car Shape'):</b>{{$reservation->vehicule->shape ?? 'Null'}}</p>

</div>
<!--end col-->
</div>
<!--end row-->
</div>
<!--end card-body-->
</div><!--end col-->
@php
$payments = App\Models\Payment::orderBy('created_at', 'desc')->get();
@endphp
<div class="col-lg-12">
<div class="card-body p-4 border-top border-top-dashed">
<div class="row g-3">
<div class="col-6">
<h6 class="text-muted text-uppercase fw-semibold mb-3">@lang('messages.TERM AND DURATION')</h6>
<p class="mb-2"><b>@lang('messages.Rental Start Date'):</b> {{$reservation->borrow}}</p>
<p class="mb-2"><b>@lang('messages.Pick up Time'):</b> {{$reservation->return}}</p>
<p class="mb-2"><b>@lang('messages.Expected Return Date'):</b> {{$reservation->return}}</p>
<p class="mb-2"><b>@lang('messages.Return Date'):</b> {{$reservation->returned ?? '/'}}</p>
</div>
<!--end col-->
<div class="col-6">

@foreach($payments as $pay)
@if($reservation->id == $pay->reservation_id)
<h6 class="text-muted text-uppercase fw-semibold mb-3">@lang('messages.Payment Details'):</h6>
<p class="text-muted mb-1">@lang('messages.Payment Method'): <span class="fw-medium" id="payment-method">{{$pay->method ?? 'Null'}}</span></p>

<p class="text-muted mb-1">@lang('messages.Card Number'): <span class="fw-medium" id="card-number">xxx xxxx xxxx xxxx</span></p>
<p class="text-muted">@lang('messages.Total Amount'): <span class="fw-medium" id="">$ </span><span id="card-total-amount">{{$pay->amount ?? 'Null'}}</span></p>
@endif
@endforeach
</div>
<!--end col-->
</div>
<!--end row-->
</div>
<!--end card-body-->
</div><!--end col-->

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="col-lg-12">
<div class="card-body p-4">




<div class="mt-4">
<div class="alert alert-info">

<p class="text-uppercase"><b>Conditions générales de location</b></p>
<p><b>
Age minimum et permis de conduire</b></p>
26 ou 30 ans minimum avec 2 ans ou 5 ans de permis de conduire obligatoire selon modèle du véhicule.
<p><b>Caution</b></p>
Le client doit déposer :  Sa Pièce d'identité originale valide + caution en espèces uniquement.
Carburant Votre véhicule est fourni avec le plein et doit être rendu avec le plein,faute de quoi vous devriez régler 3.000 dinars de frais.
<p><b>Prolongation</b></p>
Nous ne garantissons aucunes demande de prolongation sauf si le véhicule serait toujours disponible. Le client ne peut prolonger sa location que sur autorisation de SpeedyRental, toute prolongation non autorisée est soumise à une pénalité de 15.000 dinars.
<p><b>Cas de Sinistre</b></p>
<p><b>Assurance classique (comprise) :</b></p> Le client s’engage à payer tout dégât occasionné sur le véhicule qu’il soit fautif ou non fautif sur la base d’un barème tarifaire fournis à la livraison ou d’un devis estimatif réalisé par nos agents. La durée d'immobilisation du véhicule pour réparation sera facturée en plus. Le montant réclamé ne peut en aucun cas dépasser le montant de la caution du véhicule.

<p><b>Assurance Complémentaire (en option) :</b></p> Sur la base d’informations complètes fournies de la partie adverse (copies :  carte grise + permis de conduire +assurance + photos du véhicule endomagé de la partie adverse montrant son immatriculation, le client n’est pas engagé à payer les dégâts occasionnés qu’il soit fautif ou non fautif. L’incendie et le vol du véhicule ou de ses accessoires sont exclus de l´assurance complémentaire (dont le tiers est inconnu).                                                                                                                                        
Si les frais (sinistre,retard,nettoyage,prolongation) ne sont pas réglés au moment de la restitution, je soussigne (nom/prénom) en ma qualité de client, autorise pleinement SpeedyRental en sa qualité de loueur en vertu de ce contrat à débiter ces frais de ma carte de crédit finissant par XXXX à valeur maximale de la caution.
<p><b>Rapatriement et dépannage</b></p>
En cas d’immobilisation du véhicule et quelques soit les raisons sauf panne due à une usure normale, les frais de dépannage sont à la charge total du client pour un rapatriement jusqu’à nos garages.
<p><b>Restitution avant délai</b></p>
* Si le client rend le véhicule avant expiration du délai de location, celui-ci ne peut en aucun cas  réclamer un remboursement des jours restants.
* Si le client se trouve dans l’obligation de rendre le véhicule suite à un sinistre, les jours restants sont non remboursables.
<p><b>Heure de restitution</b></p>
Le véhicule doit être restitué à l'heure mentionnée sur votre réservation et le contrat. Tout retard est facturé au prix de 1500 dinars/heure. Tout changement d'heure de restitution peut entrainer des frais supplémentaires.                                  
<p><b>Lieux de livraisons</b></p>
La livraison des véhicules s'effectue sur les parkings des aéroports ou au niveau de nos agences.
<p><b>Kilométrage</b></p>
Le kilométrage est illimité sur l’ensemble de notre gamme.
<p><b>Assurances</b></p>
Seul, le ou les conducteurs mentionnés sur le contrat bénéficient de l’assurance. Tout prêt ou sous location à autres personnes est strictement interdit. En cas de sinistre survenant a un conducteur en état d'ivresse ou non mentionné sur le contrat, il sera demandé au locataire le remboursement intégral des dommages subi par le véhicule.
<p><b>Contravention</b></p>
Le client demeure seul responsable des contraventions ou de transport de produits interdit ou de personne à titre honereux.



</div>
</div>
<div class="col-lg-12">
<div class="card-body p-4 border-top border-top-dashed">
<div class="row g-3">
<div class="col-6">
<h6 class="text-muted text-uppercase fw-semibold mb-3">@lang('messages.Owner')</h6>


</div>
<!--end col-->
<div class="col-6">
<h6 class="text-muted text-uppercase fw-semibold mb-3">@lang('messages.RENTER')</h6>



</div>
<!--end col-->
</div>
<!--end row-->
</div>
<!--end card-body-->
</div>
<div class="hstack gap-2 justify-content-end d-print-none mt-4">
<a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i>@lang('messages.Print')</a>
<a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i>@lang('messages.Download')</a>
</div>
</div>
<!--end card-body-->
</div><!--end col-->

</div><!--end row-->
</div>
<!--end card-->
</div>
<!--end col-->
</div>
<!--end row-->

</div><!-- container-fluid -->
</div>
@endsection
