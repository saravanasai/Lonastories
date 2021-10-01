
<header class="header">
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg d-flex align-content-lg-between fixed-top bg-nav">
            <a href="{{route('home')}}" class="navbar-brand title fw-bold textShineBlack ml-lg-5 mt-lg-1">
                <img src="{{asset('frontend/img/logo.png')}}" alt="" width="40px" height="40px"
                    class="rounded" />&nbsp;&nbsp;<b>LOANSTORIES.COM</b>
            </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler m-sm-auto"><i class="bi bi-list text-light"></i>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse ml-lg-5 pl-lg-5 text-nowrap">
                <ul class="navbar-nav align-items-sm-end align-items-md-end text-center">
                    <li class="nav-item ">
                        <a href="{{route('user.About')}}" class="text-gray nav-link link-scroll"><strong>ABOUT
                                US</strong></a>
                    </li>
                    <li class="nav-item ml-lg-4">
                        <a href="{{route('user.connect')}}" class="nav-link"><strong>CONNECT</strong></a>
                    </li>
                    <li class="nav-item dropdown ml-lg-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>PRODUCTS</strong>
                        </a>
                        <div class="dropdown-menu bg-gray border-white rounded" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item text-secondary" href="{{route('user.PersonalLoan')}}"><strong>Personal
                                    Loan</strong></a>
                            <a class="dropdown-item text-secondary" href="{{route('user.HomeLoan')}}"><strong>Home
                                    Loan</strong></a>
                            <a class="dropdown-item text-secondary"
                                href="{{route('user.Mortages')}}"><strong>Mortages</strong></a>
                            <a class="dropdown-item text-secondary" href="{{route('user.BusinessLoan')}}"><strong>Business
                                    Loan</strong></a>
                            <a class="dropdown-item text-secondary" href="{{route('user.EducationLoan')}}"><strong>Education
                                    Loan</strong></a>
                        </div>
                    </li>

                    <li class="nav-item text-center ml-lg-4">
                        @if(!session('customer'))
                        <a href="{{route('signup.index')}}" class="btn btn-light text-dark pull-right mysts"><strong>
                                SIGN UP</strong></a>
                        @else
                        <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-light text-dark pull-right mysts"><strong>MY
                            STORIES</strong></a>
                        @endif
                    </li>
                    @if(!session('customer'))
                    <li class="nav-item text-center ml-lg-4">
                        <form action="{{route('userlogout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-light text-dark pull-right"><strong>
                                Logout</strong></button>
                        </form>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
