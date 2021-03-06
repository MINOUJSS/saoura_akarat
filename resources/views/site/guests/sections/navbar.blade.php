<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{route('site.index')}}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{asset('/sites/original/img/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">الساورة للعقارات</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{route('site.index')}}" class="nav-item nav-link active">الرئيسية</a>
                <a href="{{route('site.about_us')}}" class="nav-item nav-link">من نحن</a>
                <a href="{{route('site.contra')}}" class="nav-item nav-link">سياسة خصوصية</a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="property-list.html" class="dropdown-item">Property List</a>
                        <a href="property-type.html" class="dropdown-item">Property Type</a>
                        <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                    </div>
                </div> --}}
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                    </div>
                </div> --}}
                <a href="{{route('site.contact_us')}}" class="nav-item nav-link">إتصل بنا</a>
            </div>
            <a href="{{route('site-landing-page-register-real-estate')}}" class="btn btn-primary px-3 d-none d-lg-flex">إضافة عقار</a>
        </div>
    </nav>
</div>