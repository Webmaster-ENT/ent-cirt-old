<!--
    =========================================================
    * Soft UI Dashboard Tailwind - v1.0.4
    =========================================================
    
    * Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
    * Copyright 2022 Creative Tim (https://www.creative-tim.com)
    * Licensed under MIT (https://www.creative-tim.com/license)
    * Coded by Creative Tim
    
    =========================================================
    
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <!DOCTYPE html>
    <html>
      <head>
          @include('partials.header')
      </head>
    
      <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
         
        {{--  sidebar  --}}
         @include('layouts.dashbord.sidebar')
         {{--  end-sidebar  --}}
        
         <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
          {{--  navbar  --}}
          @include('layouts.dashbord.navbar')
          {{--  end-navbar  --}}
        </main>
    
      </body>
     @include('partials.footer')
    </html>
    