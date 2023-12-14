<nav class="navbar navbar-expand-sm" style="backdrop-filter: blur(1px); background-color: #c6d1e7; height:80px;">
    {{-- injecting menubar helper --}}
    @inject('menubar_helper', 'App\Helpers\MenubarHelper')
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Appointment Booking System" style="width:40px;"
                class="rounded-pill">
            A.HEALTHCARE
        </a>
        <!-- Toggler button for small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
            aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link " href="/">Home</a>
                </li>
                @foreach ($menubar_helper->list() as $menu)
                    @if ($menu->type == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $menu->module->link }}">{{ $menu->name }}</a>
                        </li>
                    @elseif ($menu->type == 2)
                        <li class="nav-item"><a class="nav-link"
                                href="{{ route('view.dynamic', ['id' => $menu->page->id]) }}">{{ $menu->name }}
                            </a>
                        </li>
                    @else
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ $menu->external_link }}">{{ $menu->name }}</a> </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a href="/login" class=" btn">login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
