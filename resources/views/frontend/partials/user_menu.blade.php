<div class="col-lg-2">
    <ul class="account-nav">
        @if (auth()->user()->is_admin)
            <li><a href="{{ route('admin.dashboard') }}" class="menu-link menu-link_us-s ">Dasbor</a></li>
        @endif
        <li><a href="{{ route('profile.index') }}"
                class="menu-link menu-link_us-s {{ isset($profile) ? $profile : '' }}">Profil</a></li>
        <li><a href="{{ route('order.index') }}"
                class="menu-link menu-link_us-s {{ isset($order) ? $order : '' }}">Pesanan</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="menu-link menu-link_us-s"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
            </form>
        </li>
    </ul>
</div>
