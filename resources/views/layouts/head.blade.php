<base href="">
<title>@yield('title-page', 'Eduarda') - Chá de Casa Nova</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta charset="utf-8" />
<meta property="og:locale" content="pt_BR" />
<meta name="description" content="Participe do Chá de Casa Nova! Celebre a nova fase com amigos e família, descubra detalhes sobre o evento e como contribuir para tornar este momento ainda mais especial.">
<meta property="og:title" content="Chá de Casa Nova - Celebre Conosco!">
<meta property="og:url" content="https://www.exemplo.com/cha-de-casa-nova/">
<meta property="og:description" content="Junte-se ao Chá de Casa Nova e celebre com amigos e família. Descubra como participar e contribuir para tornar este momento inesquecível.">
<meta property="og:image" content="{{ asset('assets/media/avatars/eduarda.jpg') }}" />

<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.webp') }}" />
<!--begin::Fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!--end::Fonts-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<!--end::Global Stylesheets Bundle-->
<!--begin::Custom Head-->
@yield('custom-head')
<!--end::Custom Head-->